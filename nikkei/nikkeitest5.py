####################################################################################################
#   新規作成   2023/12/1  takao.hattori
#   修正       2023/12/6  takao.hattori(結果ファイルのファイル名に作業日時をつけて保存する処理に変更)
#   修正       2023/12/7  takao.hattori(日経新聞の人事異動サイトから人事情報のページのHTMLを取り出し、
#                        会社名、記事のURL、HP掲載日を取得できる処理を追加)
####################################################################################################
#ライブラリのインポート
from bs4 import BeautifulSoup
import urllib3
import codecs
import datetime  
import re
import os

#人事データ取得先URL変数の定義
b_url = "https://www.nikkei.com/news/jinji/hatsurei/"
#開始ページ変数の定義
start_num = 1
#終了ページ変数の定義
end_num = 331
# 現在日時の取得
dt = datetime.datetime.now()
#　現在日時を年4桁、月2桁、日付2桁、時間、分、秒のフォーマットで取得する
date1 = dt.strftime('%Y%m%d%H%M%S')
# 結果ファイル格納先フォルダー
#dir1 = 'C:\\Users\\takao.hattori\\OneDrive - Accenture\\python1\\result\\'
# 格納先ファイル名の定義
file_name = "result" + date1 + ".txt"

#検索文字の設定(人事、企業名のタグ)
pattern1 = '^<a class="m-articleTitle_text_link" href'
repattern1 = re.compile(pattern1)

#検索文字の設定(日付タグ)
patturn2 = '^<div class="col time">'
repattern2 = re.compile(patturn2)


# 処理開始メッセージの出力
print("日経新聞からの人事情報取得処理開始")  

for i in range(start_num,end_num,30):
    http = urllib3.PoolManager()
    url = b_url + "?bn=" + str(i)
    r = http.request('GET', url)

    soup = BeautifulSoup(r.data, 'html.parser')

    # セクションタグを取得する
    section_tag = soup.section

    # 要素の文字列を取得する
    title = section_tag.string

    # セクション要素を出力
    try:
        print(section_tag,file=codecs.open(file_name,'a','utf-8'))
    # ファイルへの書き込みエラー時、例外処理を実行し、エラーをコンソールに出力する。
    except IOError as e:
        print("Do not Write Result File!")
        print(e)
        exit

#取得したHTMLから、必要なデータを抽出し、抽出ファイルに書き込む
result_file = "result.txt"


file_data = open(file_name,"r",encoding="utf-8")

file_exist = os.path.isfile(result_file)
if file_exist:
    os.remove(result_file)

for line in file_data:
    result1 = repattern1.match(line)
    result2 = repattern2.match(line)
    with open(result_file,mode="a",encoding="utf-8") as f:
        if result1:
            f.write(line)
        elif result2:
            f.write(line)
            

file_data.close()

#w_count = (sum([1 for _ in open(result_file,encoding="utf-8")]))
#result_count = w_count / 2
#print('検索結果: 本日の検索件数は%d件です' % (result_count))    


#　処理終了メッセージのコンソール出力
print("日経新聞からの人事情報取得処理終了") 
#sys.exit()     
