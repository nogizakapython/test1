#######   日産自動車 中計・決算ニュース情報取得ツール　###########
#######   新規作成  2024/04/01  ##########
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
date4 = dt.strftime('%Y年%m年%d日')
youbi = dt.strftime('%a')
date5 = int(date2)
date6 = date5 - 1
date7 = dt.strftime('%Y/%m/%d')

input_file = "nissan" + date1 + ".txt"
out_file = "nissan.txt"
date_str = ""
w_title = ""
base_url = 'https://www.nissan-global.com'
web_url = 'https://www.nissan-global.com/JP/IR/LIBRARY/FINANCIAL/'
max_row = 5
base_file = "【IR】検索結果_yyyymmdd.xlsx"
export_file = "【IR】検索結果_" + date3 + ".xlsx"
row_count = 0
write_flag = 0
xpath_str1 = ""
w_url = ""
t_year = 0
year_array=[]
w_titlehead = ""

# Chromeを指定する
driver = webdriver.Chrome()

# Chromeを開いて企業HPにアクセスする



for year in [date5,date6]:
    if year == date6:
      target_url = web_url + str(year) + '/'
    else:
      target_url = web_url   
             
    try:
       driver.get(target_url)
       sleep(3)

       for i in range(1,31):
         try:
                     
            xpath_str1 = '//*[@id="pbBlock1988999"]/div'
                          
            
            
         except:
            break    
         element_str1 = driver.find_element(by=By.XPATH,value=xpath_str1)
         print(element_str1.get_attribute("outerHTML"),file=codecs.open(input_file,'a','utf-8'))
          
       
    except EnvironmentError as e:
       str100 = e     
    except:
       str100 = 1
     
# 画面を閉じる
driver.quit()
file_exist = os.path.isfile(out_file)
if file_exist:
   os.remove(out_file)

shutil.copy2(input_file,out_file)


fileobj = open(out_file,encoding="utf-8")
while True:
     w_urlstr = ""
     w_titlestr = ""
     
     line1 = fileobj.readline()
     line1 = line1.replace("\n","")
     if line1:
       row_count += 1
     else:
       break   

     result0 = re.match('                <a href',line1)
     result1 = re.match('            ',line1)
     
     if result0:
        w_array0 = line1.split('=')
        w_urlstr = w_array0[1]
        w_urlstr = w_urlstr.replace('target','')
        w_urlstr = w_urlstr.replace('"','')
        url_result = re.match('https',w_urlstr)
        if url_result:
           w_url = w_urlstr
        else:   
           w_url = base_url + w_urlstr
        # print(w_url)
        


     if result1:
        tag_result1 = re.search('<a',line1)
        tag_result2 = re.search('li',line1)
        if tag_result1 or tag_result2:
           continue
        else:
           w_array1 = line1.split()
           w_titlework = w_array1[0]
           if w_titlework == "過去の決算資料":
              break
           if w_titlework == "第3四半期</a>" or w_titlework == "上期</a>" or w_titlework == "第1四半期</a>":
              continue
           else:
              title_result1 = re.search('決算発表',w_titlework)
              
              if title_result1:
                 w_array2 = w_titlework.split('（')
                 w_titlehead = w_array2[0]
                 
                 w_ymd = w_array2[1]
                 w_ymd = w_ymd.replace('）','')
                 #  print(w_ymd)   
              
              keyword = r'(決算短信|決算参考資料)'
              title_result2 = re.search(keyword,w_titlework)
              if title_result2:
                 w_titleend = w_titlework.replace('</a>','')
                 w_title = w_titlehead + " " + w_titleend
                #  print(w_title)
     
                 wb = op.load_workbook(export_file)
                 sh_name = '日産自動車'
                 ws = wb[sh_name]
                 ws.cell(row=max_row,column=2).value = w_title
                 ws.cell(row=max_row,column=3).value = w_url
                 ws.cell(row=max_row,column=4).value = w_ymd
                 ws.cell(row=max_row,column=6).value = w_url
                 ws.cell(row=max_row,column=6).hyperlink = w_url
                 ws.cell(row=max_row,column=6).font = Font(color='0000FF',underline='single')
                
                 max_row += 1
                 # エクセルファイルの保存
                 wb.save(export_file)
