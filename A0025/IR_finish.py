###################################################################
###   中計決算50社検索対象、作業用ファイルの削除処理 ##########
###   新規作成 2024/04/08  takao.hattori  ##########################
###################################################################

#ライブラリの読み込み
import glob
import os
import IR_delwork
import shutil
import datetime


date1 = datetime.datetime.now()
#作業用ファイルのリスト作成
del_list1 = glob.glob("*20*.txt")
#作業用リストファイル配列
array1 = []

for i in list(del_list1):
    #文字列から「\\」を消す
    str1 = i.replace("\\","")
    #配列に格納する
    array1.append(str1)

dir1 = os.getcwd()

for j in list(array1):
    delfile = IR_delwork.Delworkfile(dir1,j)
    delfile.delworkfile()


#作業用ファイルのリスト作成
del_list2 = glob.glob("【IR】検索結果_20*xlsx")
#作業用リストファイル配列
array2 = []

for k in list(del_list2):
    #文字列から「\\」を消す
    str2 = k.replace("\\","")
    #配列に格納する
    array2.append(str2)

dir2 = os.getcwd()

for l in list(array2):
    delfile = IR_delwork.Delworkfile(dir2,l)
    delfile.delworkfile()


shutil.rmtree(".\__pycache__")

