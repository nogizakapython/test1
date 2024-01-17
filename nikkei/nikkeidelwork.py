#####################################################################
#####    日付付き一時ファイル削除クラス               ################
#####   新規作成   2023/12/20  takao.hattori         ################
#####   クラスの使用法
#####   ①クラスを読み込む
#####   import nikkeioutput
#####   ②インスタンス変数を指定する
#####   例)
#####   p = nikkeioutput.FileOutput('ファイル名','書き込む変数')
#####   ③インスタンス内の関数を実行する
#####   p.write_file()
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
