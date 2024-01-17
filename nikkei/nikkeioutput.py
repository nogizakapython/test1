############################################################
#####    CSVファイル出力クラス               ################
#####   新規作成   2023/12/12  takao.hattori   #############
#####   クラスの使用法
#####   ①クラスを読み込む
#####   import nikkeioutput
#####   ②インスタンス変数を指定する
#####   例)
#####   p = nikkeioutput.FileOutput('ファイル名','書き込む変数')
#####   ③インスタンス内の関数を実行する
#####   p.write_file()
############################################################


class FileOutput:

    #コンストラクタ
    def __init__(self, filename, msg):
        self.filename = filename
        self.msg = msg
    #CSVファイルへの出力処理関数   
    def write_file(self):
        #ファイルを追記モードで開く
        with open(self.filename,mode="a",encoding="SJIS") as f:
            #ファイルを書き込む
            f.write(self.msg)
            #ファイルを閉じる
            f.close()
