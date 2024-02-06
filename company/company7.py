##############################################
###   日経サイト検索対象ファイル作成 ##########
###   新規作成 2023/12/12 takao.hattori  #####
##############################################

import openpyxl as op1
import os
import nikkeioutput



wb = op1.load_workbook("PRD JP CR List_v1.4.2.xlsx")
ws = wb["PRD JP CR "]

# 日経人事異動対象ファイル名の定義
out_file = "nikkei_read.csv"


is_file = os.path.isfile(out_file)

#日経人事異動対象ファイル名の定義
if is_file:
    os.remove(out_file)

for row in ws.iter_rows(min_row=3):
    value_list = []
    for c in row:
        value_list.append(c.value)
    w_str = value_list[8]
    if w_str == "●":
       with open(out_file,mode="a",encoding="SJIS") as f:
           str1 = value_list[3] + "\n"
           output1 = nikkeioutput.FileOutput(out_file,str1)
           output1.write_file()
    
