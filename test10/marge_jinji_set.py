#######   人事異動データマージ処理用パラメータ取得  ######
#######   新規作成   2024/1/17         ######
#######   作成者     takao.hattori     ######
#############################################

class Marge_jinji_set:
    # 人事異動情報、最初の行変数を定数で指定する。(改変不可)
    global __value__
    __value__ = 5
    # 人事異動情報、データの最初の行変数を指定する。
    def read_start(self):
        values1 = __value__
        return values1
    def out_start_row(self):
        # 人事異動情報、マージデータ書き込み行変数の読み込み
        values2 = __value__
        return values2