#######   全銀協正会員リスト作成　###########
#######   新規作成  2024/05/20  ##########
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
from openpyxl.styles.fonts import Font


dt = datetime.datetime.now()
date1 = dt.strftime('%Y%m%d%H%M%S')
date2 = dt.strftime('%Y')
date3 = dt.strftime('%Y%m%d')
w_ymd = dt.strftime('%Y年%m年%d日')


input_file = "zenginren" + date1 + ".txt"
out_file = "zenginren.txt"
date_str = ""
w_title = ""

target_url = 'https://www.zenginkyo.or.jp/abstract/outline/organization/member-01/'
max_row = 5
base_file = "全銀協正会員テンプレート.xlsx"
export_file = "全銀協正会員" + date3 + ".xlsx"
row_count = 0
write_flag = 0
xpath_str1 = ""
# Chromeを指定する

driver = webdriver.Chrome()

# テンプレートからエクセルファイルをコピーする関数
def copyexcelfile():
    shutil.copy(base_file,export_file)

# エクセルファイルに銀行名を出力する関数
def outputfile(result_file,bank_name,max_row):
    wb = op.load_workbook(result_file)
    sh_name = '銀行'
    ws = wb[sh_name]
    ws.cell(row=max_row,column=3).value = bank_name
                
    
    # エクセルファイルの保存
    wb.save(result_file)
    




# Chromeを開いて企業HPにアクセスする
try:
    driver.get(target_url)
    sleep(5)
    

    
    for i in range(1,120):
        
        
        try:
            xpath_str1 = '//*[@id="c14512"]/div/div/div/ul/li[' + str(i) + ']'
            element_str1 = driver.find_element(by=By.XPATH,value=xpath_str1)
            print(element_str1.get_attribute("outerHTML"),file=codecs.open(input_file,'a','utf-8'))
            
        except:
            
            break
        

except EnvironmentError as e:
    str100 = e     
except:
    str1000 = ""

# 画面を閉じる
driver.quit()
file_exist = os.path.isfile(out_file)
if file_exist:
   os.remove(out_file)

shutil.copy2(input_file,out_file)

copyexcelfile()


fileobj = open(out_file,encoding="utf-8")
while True:
    line1 = fileobj.readline()
    line1 = line1.replace("\n","")
    if line1:
        row_count += 1
    else:
        break   
    result1 = re.search('a href',line1)
    if result1:
        w_array1 = line1.split('>')
        w_bankname = w_array1[2]
    else:           
        w_array1 = line1.split(">")    
        w_bankname = w_array1[1]
        w_bankname = w_bankname.replace('</li','')
        w_bankname = w_bankname[4:]
        w_bankname = w_bankname.replace(' ','')
        
    w_bankname = w_bankname.replace('</a','')
    
    outputfile(export_file,w_bankname,max_row)                
    max_row += 1
    