###################################################################
###   日経サイト検索対象、作業用ファイルの削除処理 ##########
###   新規作成 2023/12/20  takao.hattori  ##########################
###################################################################

#ライブラリの読み込み
import glob
import os
import nikkeidelwork
import shutil

#作業用ファイルのリスト作成
del_list1 = glob.glob("result*txt")
#作業用リストファイル配列
array1 = []

for i in list(del_list1):
    #文字列から「\\」を消す
    str1 = i.replace("\\","")
    #配列に格納する
    array1.append(str1)

dir1 = os.getcwd()

for j in list(array1):
    delfile = nikkeidelwork.Delworkfile(dir1,j)
    delfile.delworkfile()


#作業用ファイルのリスト作成
del_list2 = glob.glob("【日経】検索結果_20*xlsx")
#作業用リストファイル配列
array2 = []

for k in list(del_list2):
    #文字列から「\\」を消す
    str2 = k.replace("\\","")
    #配列に格納する
    array2.append(str2)

dir2 = os.getcwd()

for l in list(array2):
    delfile = nikkeidelwork.Delworkfile(dir2,l)
    delfile.delworkfile()


shutil.rmtree(".\__pycache__")

