from selenium import webdriver
import time

# 待機時間の設定
time1 = 30
# ブラウザを起動
driver = webdriver.Chrome()

# Googleを開く
driver.get('https://www.google.com/?hl=ja')

# 30秒待機
time.sleep(time1)

# ブラウザを閉じる
driver.quit()