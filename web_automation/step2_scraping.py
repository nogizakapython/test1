"""
第4章 演習 - ページからデータを収集してExcelに保存する
"""
import asyncio
import logging
import os
import openpyxl
from datetime import datetime
from playwright.async_api import async_playwright

os.makedirs("output", exist_ok=True)
_ts = datetime.now().strftime('%Y%m%d_%H%M%S')
logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s - %(levelname)s - %(message)s",
    handlers=[
        logging.FileHandler(f"output/web_automation_{_ts}.log", encoding="utf-8"),
        logging.StreamHandler(),
    ],
)


async def main():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=False, slow_mo=500)
        page = await browser.new_page()

        logging.info("ブラウザを起動しました")
        await page.goto("http://localhost:5000/public/news")

        items = await page.query_selector_all(".news-item")
        logging.info(f"{len(items)} 件のニュースを検出しました")

        data = []
        for item in items:
            title_el = await item.query_selector(".news-title")
            cat_el   = await item.query_selector(".news-category")
            date_el  = await item.query_selector(".news-date")
            body_el  = await item.query_selector(".news-body")
            data.append({
                "タイトル": await title_el.inner_text() if title_el else "",
                "カテゴリ": await cat_el.inner_text()   if cat_el   else "",
                "日付":     await date_el.inner_text()  if date_el  else "",
                "本文":     await body_el.inner_text()  if body_el  else "",
            })

        out_path = "output/news_data.xlsx"
        wb = openpyxl.Workbook()
        ws = wb.active
        ws.append(["タイトル", "カテゴリ", "日付", "本文"])
        for row in data:
            ws.append([row["タイトル"], row["カテゴリ"], row["日付"], row["本文"]])
        wb.save(out_path)
        logging.info(f"{len(data)} 件のデータを {out_path} に保存しました")
        input("ブラウザを確認したら Enter キーを押してください: ")


if __name__ == "__main__":
    asyncio.run(main())
