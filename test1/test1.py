#ライブラリのインポート
from bs4 import BeautifulSoup
import urllib3
import codecs
import datetime  
import openpyxl
import re
import os

# 現在日時の取得
dt = datetime.datetime.now()
#　現在日時を年4桁、月2桁、日付2桁、時間、分、秒のフォーマットで取得する
date1 = dt.strftime('%Y%m%d%H%M%S')
date2 = dt.strftime('%Y')

wb = openpyxl.load_workbook("日経サイト掲載無しリスト.xlsx")
ws = wb['sheet2']

for row in ws.iter_rows(min_row=2):
    value_list = []
    for c in row:
        value_list.append(c.value)
    w_company = value_list[1]    
    w_url = value_list[3]
    if w_company == "アッヴィ":
        w_url = "https://www.abbvie.co.jp/press-release/" + date2 + "-news-archive.html"
    elif w_company == "三菱ふそうトラック・バス":
        w_url = "https://www.mitsubishi-fuso.com/ja/news-main/press-release/" + date2 + "/" 
    elif w_company == "MARUHAN CO. LTD.":
        w_url =  "https://www.maruhan.co.jp/news/" + date2 + "/"
    elif w_company == "STRIPE INTERNATIONAL":
        w_url =  "https://www.stripe-intl.com/news/" + date2 + "/"
    elif w_company == "TSUMURA LIFESCIENCE CO.":
        w_url =  "https://www.bathclin.co.jp/news/" + date2 + "/" 
                

    print(w_url)