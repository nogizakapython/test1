#######   myTIM勤務終了ボタン処理　###########
#######   新規作成  2023/11/27  ##########
#######   Author  takao.hattori ###########



# 時間を計るライブラリをインポート
import time
# WebDriverライブラリをインポート
from selenium import webdriver

from selenium.webdriver.common.by import By
# ChromeのWebDriverライブラリをインポート
#from webdriver_manager.chrome import ChromeDriverManager
#from selenium.webdriver import Chrome 


# Chromeを指定する
driver = webdriver.Chrome()
# Chromeを開いてMyTIMにアクセスする
driver.get('https://whm.accenture.com/mytim/secure/punchClock/regist')

#待機時間変数として120秒を設定する
time1 = 120
time2 = 20

# 待機処理関数
def sleeptime(s_time):
    time.sleep(s_time)

# 待機する
# sleeptime(time1)

#　勤務開始ボタンを押下する
# element = driver.find_element(By.XPATH, '//*[@id="workStart1"]/div')


#element.click()


# 待機する
sleeptime(time1)


#　勤務終了ボタンを押下する
element = driver.find_element(By.XPATH, '//*[@id="workEnd1"]/div')

element.click()

sleeptime(time2)

# 画面を閉じる
driver.quit()