#######   人事異動、組織改編マージ処理用パラメータ取得  ######
#######   新規作成   2024/1/22         ######
#######   作成者     takao.hattori     ######
#####     クラスの使用方法              ######
#####     ① ライブラリを読み込む
#####      from marge_set import Marge_set
#####     ② インスタンスを読み込む
#####      marge_param = Marge_set()
#####     ③ 出力開始行をset_value関数の引数に指定して呼び出す
#####      marge_param.set_value(start_row)
#####     ④ get_value関数で出力開始行を取り出す
#####      startnum = marge_param.get_value()
#####
#####     このクラスは人事異動、組織改編共通のクラスです
#####     引数でエクセルを読み込み、書き込み開始行チェックをset_value関数でチェックします。
#############################################

class Marge_set:
    # 人事異動情報、最初の行変数を定数で指定する。(改変不可)
    
    def __init__(self,value=1):
        self.__value = value
    # 人事異動情報、データの最初の行変数を指定する。
    
    def get_value(self):
        return self.__value
    
    
    def set_value(self,value):
        if value <= 0:
            raise ValueError("出力開始行設定が間違っています")
        self.__value = value
    