"""
演習問題 解答例 - 認証が必要なページからレポートデータを収集してExcelに保存する
"""
import asyncio
import configparser
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


def load_auth(config_file: str = "auth.ini") -> tuple:
    config = configparser.ConfigParser()
    config.read(config_file, encoding="utf-8")
    return config["auth"]["username"], config["auth"]["password"]


async def main():
    username, password = load_auth()
    logging.info(f"認証情報を読み込みました（ユーザー: {username}）")

    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=False, slow_mo=500)
        page = await browser.new_page()

        await page.goto("http://localhost:5000/login")
        await page.fill("input[name='username']", username)
        await page.fill("input[name='password']", password)
        await page.click("button[type='submit']")
        await page.wait_for_url("http://localhost:5000/dashboard")
        logging.info("ログイン成功！")

        await page.goto("http://localhost:5000/reports")
        rows = await page.query_selector_all(".report-row")
        logging.info(f"{len(rows)} 件のレポートを検出しました")

        data = []
        for row in rows:
            id_el     = await row.query_selector(".report-id")
            title_el  = await row.query_selector(".report-title")
            status_el = await row.query_selector(".report-status")
            date_el   = await row.query_selector(".report-date")
            author_el = await row.query_selector(".report-author")
            data.append({
                "ID":       await id_el.inner_text()     if id_el     else "",
                "タイトル": await title_el.inner_text()  if title_el  else "",
                "ステータス": await status_el.inner_text() if status_el else "",
                "提出日":   await date_el.inner_text()   if date_el   else "",
                "担当者":   await author_el.inner_text() if author_el else "",
            })

        out_path = "output/reports_data.xlsx"
        wb = openpyxl.Workbook()
        ws = wb.active
        ws.append(["ID", "タイトル", "ステータス", "提出日", "担当者"])
        for row in data:
            ws.append([row["ID"], row["タイトル"], row["ステータス"], row["提出日"], row["担当者"]])
        wb.save(out_path)
        logging.info(f"{len(data)} 件のデータを {out_path} に保存しました")


if __name__ == "__main__":
    asyncio.run(main())
