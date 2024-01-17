########################################################
#####  人事情報掲載先のURL(絶対パスへ変換)、企業名、掲載日をCSV
#####  ファイルに出力する処理         ###################
#####  新規作成 2023/12/6 takao.hattori  ###############
#####  修正     2023/12/7 takao.hattori 出力結果を現在使用しているフォーマットに修正
########################################################

# ライブラリのインポート
import os
import re


#検索文字の設定(人事、企業名のタグ)
pattern1 = '^<a class="m-articleTitle_text_link" href'
repattern1 = re.compile(pattern1)

#検索文字の設定(掲載日付)
patturn2 = '^<div class="col time">'
repattern2 = re.compile(patturn2)

# ディレクトリ
#dir1 = 'C:\\Users\\takao.hattori\\OneDrive - Accenture\\python1\\result\\'
# input File
base_file =  "result.txt"
# Output File
output_file = "result1.csv"
# 企業、URLデータの除外文字列
msg1 = "<a class=\"m-articleTitle_text_link\""
msg2 = "<span class=\"m-articleTitle_text_main\">"
msg3 = "</span></a></h3>"
msg4 = ">"
# 掲載日付の除外文字列
msg5 = "<div class=\"col time\"><p class=\"m-articleTitle_pubdate\">"
msg6 = "</p></div>"

#タグ抽出ファイルを開く
file_data = open(base_file,"r",encoding="utf-8")
#前回処理のファイルを削除する
result = os.path.exists(output_file)

if result:
    os.remove(output_file)


# CSVファイルの作成処理
for line in file_data:
    result1 = repattern1.match(line)
    result2 = repattern2.match(line)
    with open(output_file,mode="a",encoding="SJIS") as f:
        if result1: 
            line = line.replace("\n","")
            content_r = line.replace(msg1,"")
            content_r = content_r.replace(msg2,"")
            content_r = content_r.replace(msg3,"")
            content_r = content_r.replace(msg4,"")
            array1 = content_r.split("\"")
            base_url = "https://www.nikkei.com"
            result_url = base_url + array1[1]
            result_company = array1[2]
            #w_msg = result_url + "," + result_company + ","
            w_msg = result_company + "," + result_url + ","
            #print(w_msg)
        elif result2:
            content_d = line.replace(msg5,"")
            content_d = content_d.replace(msg6,"")
            w_msg = w_msg + content_d
            f.write(w_msg)     



