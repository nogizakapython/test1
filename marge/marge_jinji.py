#######   人事異動シートのマージ処理    ######
#######   新規作成   2024/1/16         ######
#######   作成者     takao.hattori     ######
#############################################

# ライブラリの呼び出し
from marge_templatecopy import Marge_Copy
from marge_dirList import Marge_filelist
from marge_set import Marge_set
from marge_jinji_inout_old import Marge_jinji_output

#出力開始行の定義
start_row = 5

# マージ作業用テンプレートファイルのコピーインスタンスを呼び出し、処理を実行する。
copy = Marge_Copy()
copy.temp_copy()
# 出力先のファイル名を取得する
export_file = copy.get_export_file_name()
# 前回作業用のマージ対象一覧ファイルの削除
marge = Marge_filelist()
marge.del_tempfile()
# マージ作業対象一覧ファイルの作成
marge.create_file()
# マージ作業対象一覧ファイル名の取得
work_file_list = marge.get_work_file()

# 人事異動情報、マージデータ書き込み行変数の読み込み
marge_param = Marge_set()
# setterを呼び出す
marge_param.set_value(start_row)
# getterを呼び出す
startnum = marge_param.get_value()
jinji_max_count = startnum

# データのマージ作業インスタンスを呼び出し、実行、マージ結果ファイルを保存する。
r_marge = Marge_jinji_output(work_file_list,export_file,startnum,jinji_max_count)
r_marge.main()
