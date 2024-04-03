########################################################
#####  人事情報掲載先のURL(絶対パスへ変換)、企業名、掲載日をCSV
#####  ファイルに出力する処理         ###################
#####  新規作成 2023/12/6 takao.hattori  ###############
#####  修正     2023/12/7 takao.hattori 出力結果を現在使用しているフォーマットに修正
#####  修正     2024/3/1  takao.hattori 日経新聞HP変更に伴う修正
########################################################

# ライブラリのインポート
import os
import re


#検索文字の設定(日付)
pattern1 = '^<time class="dateHeadline_d18sgrke"'

#検索文字の設定(掲載時間)
patturn2 = '^<div class="container_cyywo23">'

#検索文字の設定(企業名、URL)
# patturn3 = 'href'

# input File
base_file =  "result.txt"
# Output File
output_file = "result1.csv"

#タグ抽出ファイルを開く
file_data = open(base_file,"r",encoding="utf-8")
#前回処理のファイルを削除する
result = os.path.exists(output_file)

if result:
    os.remove(output_file)


# CSVファイルの作成処理
for line in file_data:
    result1 = re.match(pattern1,line)
    result2 = re.match(patturn2,line)
    # result3 = re.search(patturn3,line)
    with open(output_file,mode="a",encoding="SJIS") as f:
        if result1:
            w_array1 = line.split(">")
            w_ymd = w_array1[1]
            w_ymd = w_ymd.replace('</time',"")

            # print(w_ymd)

        if result2:
            w_array2 = line.split(">")
            w_hm = w_array2[5]
            w_hm = w_hm.replace('</time',"")
            w_ymdhm = w_ymd + " " + w_hm
            # print(w_ymdhm)
            w_url = w_array2[10]
            w_url = w_url.replace('<a class="fauxBlockLink_f1dg9afs" href="',"")
            w_url = w_url.replace('"',"")
            # print(w_url)   
            base_url = "https://www.nikkei.com"
            result_url = base_url + w_url
            w_company = w_array2[11]
            w_company = w_company.replace("</a","")
            # print(w_company)
            w_msg = w_company + "," + result_url + "," + w_ymdhm + "\n"
            f.write(w_msg)     



