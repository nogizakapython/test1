# WebDriverライブラリをインポート
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from time import sleep
# URL変数
target_url1 = "https://catr.jp/search?utf8=%E2%9C%93&word=%E4%B8%89%E8%8F%B1%E3%81%B5%E3%81%9D%E3%81%86%E3%83%88%E3%83%A9%E3%83%83%E3%82%AF&commit=%E6%A4%9C%E7%B4%A2"

# XPATH変数
# xpath1 = '//*[@id="word"]'
# xpath2 = '/html/body/div/div[2]/div/form/div/input[2]'
# xpath3 = '//*[@id="container"]/form/div[2]/input'
# xpath4 = '/html/body/div[1]/div/div[2]/ul[2]/li[2]/a'
# xpath5 = '//*[@id="container"]/div/div[2]/form[1]/input[6]'
# xpath6 = '//*[@id="container"]/div/div/form[1]/input[6]'

# ログインページにアクセスし、ユーザー名、パスワードを自動入力してログインする。
driver = webdriver.Chrome()
driver.get(target_url1)
sleep(20)

# text1 = driver.find_element(By.XPATH, xpath1)
# text1.send_keys("三菱ふそう")


# button1 = driver.find_element(By.XPATH, xpath2)
# driver.execute_script('arguments[0].click();', button1)

# sleep(30)

# sleep(5)

# ログインしたので、メニューから予約をクリックする
# driver.get(target_url2)
# menu4 = driver.find_element(By.XPATH, xpath4)
# menu4.click()
# sleep(5)

# #トレーニングジムボタンをクリックする
# elem1 = WebDriverWait(driver, 10).until(lambda x: x.find_element(By.XPATH, xpath5))
# elem1.click()

# # 予約日ボタンをクリックする
# elem2 = WebDriverWait(driver, 10).until(lambda x: x.find_element(By.XPATH, xpath6))
# elem2.click()

# sleep(180)
# driver.quit()
