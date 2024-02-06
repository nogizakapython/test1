#####################################################################
#####   日付付きエクセルファイルの読み込みエラー    ################
#####   新規作成   2024/1/9  takao.hattori         ################
#####   クラスの使用法
#####   ①クラスを読み込む
#####   import company_fileopenerror
#####   ②インスタンス変数を指定する
#####   例)
#####   fileerr = company_fileopenerror.ReadfileError('ファイル名')
#####   ③インスタンス内の関数を実行する
#####   fileerr.readerror()
############################################################

import os

class ReadfileError:

    #コンストラクタ
    def __init__(self,filename):
        self.filename = filename
        
    #CSVファイルへの出力処理関数   
    def readerror(self):
        #ファイルを追記モードで開く
        print(self.filename + "ファイルが開いています。閉じて再実行してください")