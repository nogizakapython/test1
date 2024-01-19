###################################################################
###   作業用マージファイル削除処理 ##########
###   新規作成 2024/1/19  takao.hattori  ##########################
###################################################################

#ライブラリの読み込み
import glob
import os
import marge_delwork
import shutil


#作業用ファイルのリスト作成
del_list1 = glob.glob("*人事異動・組織改編情報List_20*.xlsm")
#作業用リストファイル配列
array1 = []

for p in list(del_list1):
    #文字列から「\\」を消す
    str1 = p.replace("\\","")
    #配列に格納する
    array1.append(str1)

dir1 = os.getcwd()

for q in list(array1):
    delfile = marge_delwork.Delworkfile(dir1,q)
    delfile.delworkfile()



#作業用ファイルのリスト作成
del_list2 = glob.glob("PRD JP_人事異動・組織改編情報List_20*.xlsx")
#作業用リストファイル配列
array2 = []

for k in list(del_list2):
    #文字列から「\\」を消す
    str2 = k.replace("\\","")
    #配列に格納する
    array2.append(str2)

dir2 = os.getcwd()

for j in list(array2):
    delfile = marge_delwork.Delworkfile(dir2,j)
    delfile.delworkfile()



shutil.rmtree(".\__pycache__")

