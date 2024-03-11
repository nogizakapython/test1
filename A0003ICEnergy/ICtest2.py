from datetime import datetime
import re
# 時間を計るライブラリをインポート
import re
import os
# WebDriverライブラリをインポート
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
import openpyxl as op
import codecs
from time import sleep
import shutil
import selenium
import sys



base_url = "https://www.cosmo-energy.co.jp/ja/about/press.html#"
target_url = ""
date_now = datetime.now()
date1 = date_now.strftime('%Y/%m/%d')
date2 = date_now.strftime('%Y')
date3 = int(date2) - 1

def get_url(year):
    work_url = base_url + str(year)
    return work_url

w_ymd_array = date1.split('/')
w_month = int(w_ymd_array[1])
if w_month <= 3:
    target_url = get_url(date3)
else:
    target_url = get_url(date2)


xpath_str1 = '//*[@id="list-0c2c1d0398"]/li[1]/a'

file_name = "test1.txt"

driver = webdriver.Chrome()
driver.get(target_url)

element_str1 = driver.find_element(by=By.XPATH,value=xpath_str1)
print(element_str1.get_attribute("outerHTML"),file=codecs.open(file_name,'a','utf-8'))
sleep(5)

