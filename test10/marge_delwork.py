#####################################################################
#####    マージ作業ファイル削除クラス               ################
#####   新規作成   2024/1/19  takao.hattori         ################
#####   クラスの使用法
#####   ①クラスを読み込む
#####   import marge_delwork
#####   ②インスタンス変数を指定する
#####   変数名 = marge_delwork.Delworkfile('ディレクトリ名','削除するファイル名')
#####   例)
#####   delfile = marge_delwork.Delworkfile(dir2,l)
#####   delfile.delworkfile()
############################################################

import os

class Delworkfile:

    #コンストラクタ
    def __init__(self,dirname,filename):
        self.dirname = dirname
        self.filename = filename
        
    #CSVファイルへの出力処理関数   
    def delworkfile(self):
        #ファイルを追記モードで開く
        os.chdir(self.dirname)
        try:
            os.remove(self.filename)
        except:
            print("OK") 
