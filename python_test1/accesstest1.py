#######   アクセステスト　###########
#######   新規作成  2026/06/01  ##########
#######   Author  takao.hattori ###########



# 時間を計るライブラリをインポート
import datetime
import re
import os
# WebDriverライブラリをインポート
from selenium import webdriver
from selenium.webdriver.common.by import By
import openpyxl as op
import codecs
from time import sleep
import shutil
import selenium
import sys 



dt = datetime.datetime.now()
date1 = dt.strftime('%Y%m%d%H%M%S')
date2 = dt.strftime('%Y')
date3 = dt.strftime('%Y%m%d')


file_name = "MCOMTEST1" + date1 + ".txt"
out_file = "MCOMTEST1.txt"
string1 = '<div id="sideCallouts">'
date_str = ""
w_title = ""
base_url = 'https://www.bathclin.co.jp'

target_url = 'https://experience.adobe.com/#/@accenture/so:accent8/analytics/spa/index.html#/workspace/edit/65c484b659f1313742348961?projectId=65c484b659f1313742348961'
max_row = 5
#base_file = "【企業個別】検索結果_yyyymmdd.xlsx"
export_file = "【企業個別】検索結果_" + date3 + ".xlsx"
row_count = 0
write_flag = 0
xpath_str1 = ""
# Chromeを指定する


driver = webdriver.Chrome()

file1 = open(file_name,"w")
file1.write("")
file1.close()

driver.get(target_url)
sleep(120)
