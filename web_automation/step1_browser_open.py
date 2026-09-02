"""
第3章 演習 - ブラウザを起動してページを開く
"""
import asyncio
import logging
import os
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

        title = await page.title()
        logging.info(f"ページタイトル: {title}")
        logging.info("完了")
        input("ブラウザを確認したら Enter キーを押してください: ")


if __name__ == "__main__":
    asyncio.run(main())
