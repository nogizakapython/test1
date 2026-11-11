import undetected_chromedriver as uc
from selenium.webdriver.common.by import By
import time
import json

# Chromeインスタンスを初期化
driver = uc.Chrome()

# ターゲットページに接続
driver.get("https://www.batj.com/media#corp-tabs-9ee4e0f89c-item-7ec5496af2-tab")

# スクレイピングロジック…
time.sleep(10)
# ブラウザを閉じる
driver.quit()