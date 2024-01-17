#######   組織改編データマージ処理用パラメータ取得  ######
#######   新規作成   2024/1/17         ######
#######   作成者     takao.hattori     ######
#############################################
from marge_jinji_set import Marge_jinji_set
#　人事異動のクラスを継承する
class Marge_soshiki_set(Marge_jinji_set):
    # 組織改編情報、最初の行変数を定数で指定する。(改変不可)
    global __value__
    __value__ = 6
    
    # 組織改編情報、データの最初の行変数を指定する。
    def read_start(self):
        values1 = __value__
        return values1

    # 組織改編情報、マージデータ書き込み行変数の読み込み        
    def out_start_row(self):
        values2 = __value__
        return values2