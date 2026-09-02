"""
第4章 演習 - 認証が必要なページにアクセスする
auth.ini から認証情報を読み込み、ログインしてダッシュボードを確認します
"""
import asyncio
import configparser
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
        title = await page.title()
        logging.info(f"ログイン成功！ ページタイトル: {title}")
        logging.info("完了")
        input("ブラウザを確認したら Enter キーを押してください: ")


if __name__ == "__main__":
    asyncio.run(main())
