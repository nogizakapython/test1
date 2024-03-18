#ライブラリのインポート
from bs4 import BeautifulSoup
import urllib3
import codecs
import datetime  
import re
import os
import requests

#人事データ取得先URL変数の定義
b_url = "https://www.aeon.info/ir/library/report/"
#開始ページ変数の定義
# start_num = 1
#終了ページ変数の定義
# end_num = 30
# 現在日時の取得
dt = datetime.datetime.now()
#　現在日時を年4桁、月2桁、日付2桁、時間、分、秒のフォーマットで取得する
date1 = dt.strftime('%Y%m%d%H%M%S')
# 結果ファイル格納先フォルダー
#dir1 = 'C:\\Users\\takao.hattori\\OneDrive - Accenture\\python1\\result\\'
# 格納先ファイル名の定義
file_name = "result" + date1 + ".txt"

#検索文字の設定(日付タグ)
# patturn1 = '^<p class="dateHeadline_d18sgrke">'
# repattern1 = re.compile(patturn1)

#ニュースリリース時間の設定
# patturn2 = '^<div class="container_cyywo23">'
# repattern2 = re.compile(patturn2)

#検索文字の設定(人事、企業名のタグ)
# pattern3 = '^<div class="textArea_tn9zus5">'
# repattern3 = re.compile(pattern3)





# 処理開始メッセージの出力
# print("日経新聞からの人事情報取得処理開始")  

http = urllib3.PoolManager()
url = b_url
r = http.request('GET', url)

# スクレイピング対象の URL にリクエストを送り HTML を取得する
r = requests.get(url)
soup = BeautifulSoup(r.text, 'html.parser')
print(soup,file=codecs.open("test1.txt",'a','utf-8'))

    

# ul タグの文字列を取得する
dt_text = soup.find_all(class_=["eirGroup"])
print(dt_text)
for i in list(dt_text):
    try:
        print(i,file=codecs.open(file_name,'a','utf-8'))    # セクションタグを取得する
        section_tag = soup.dt

# ファイルへの書き込みエラー時、例外処理を実行し、エラーをコンソールに出力する。
    except IOError as e:
        print("Do not Write Result File!")
        print(e)
        exit

#取得したHTMLから、必要なデータを抽出し、抽出ファイルに書き込む
result_file = "result.txt"


# file_data = open(file_name,"r",encoding="utf-8")

# file_exist = os.path.isfile(result_file)
# if file_exist:
#     os.remove(result_file)

# for line in file_data:
#     result1 = repattern1.match(line)
#     result2 = repattern2.match(line)
#     with open(result_file,mode="a",encoding="utf-8") as f:
#         if result1:
#             f.write(line)
#         elif result2:
#             f.write(line)
            

# file_data.close()


# #　処理終了メッセージのコンソール出力
# print("日経新聞からの人事情報取得処理終了") 


