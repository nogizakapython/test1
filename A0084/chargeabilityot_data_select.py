##########################################################
#  chargeability OT Operations以外のデータ削除処理       ###
#  新規作成 2024/12/18  takao.hattori                   ###
##########################################################

# ライブラリのインポート
import openpyxl
import os
import codecs
import re

# Global変数
# パス変数の定義
file_path = 'C:\chargeability'
# 一覧ファイル
file_name = 'file_list.txt'

# ファイル名
file_list_array = os.listdir(file_path)
# ExcelのWorkbookインスタンスの呼び出し
# wb = openpyxl.load_workbook(file_name)
# ExcelのWorksheet変数を定義する
# ws = wb['Sheet1']

# 前回のファイルリストを削除
os.remove(file_name)
# ファイル一覧作成
for filename in file_list_array:
    print(filename,file=codecs.open(file_name,'a','utf-8'))

# ファイル一覧から、「FlashまたがFinishで始まるファイルをヒットさせる。
target_file = ""
with open(file_name,encoding="utf-8") as f:
    for line1 in f:
        line1 = line1.replace("\n","")
        print(line1)
        result1 = re.match(r'F[i-l]*_*',line1)
        # print(result1)
        if result1:
            target_file = line1
            break
            
        

print(target_file)

# 行の最終行を取得する関数
# def end_row():
#     # 開始行変数
#     start_num = 4
#     # カウント変数
#     i = start_num
#     while True:
#         dte_str = ws.cell(i,4).value
#         if dte_str != None:
#             i += 1
#         else:
#             break
#     return i-1        

# finish_row_num = end_row()

# count = 4
# while True:
#     div = ws.cell(count,4).value
#     # 部署が「Tecnplogy」の時、１行削除する
#     if div == "Tecnology":
#         # print("削除するよ～")
#         # print(count)
#         ws.delete_rows(count)
#     elif div == None:
#         break    
#     else:    
#         count += 1

# 削除処理後、ファイルを保存する
# wb.save(file_name)    