####################################################
####       FB件数自動化テスト                  ######
####################################################
# ライブラリ
import os 
import glob
import codecs

output_file = "filelist.txt"

file_exist = os.path.isfile(output_file)
if file_exist:
    os.remove(output_file)

# 案件リスト
project_array = ["A0048","SN_0025","SN_0031","SN_0052"]
for file in project_array:
    file_patturn1 = file + "*.xlsx"
    test1 = glob.glob(file_patturn1)
    for str1 in test1:
        print(str1,file=codecs.open(output_file,'a','utf-8'))

with open(output_file,encoding="utf-8") as f:
    for line1 in f:
        line1 = line1.replace("\n","")
        if line1 == None:
            break
        print(line1)
