#######   組織改編シートのマージ処理    ######
#######   新規作成   2024/1/16         ######
#######   作成者     takao.hattori     ######
#############################################

# ライブラリの呼び出し
from marge_dirList import Marge_filelist
from marge_templatecopy import Marge_Copy
from marge_soshiki_set import Marge_soshiki_set
from marge_soshiki_inout import Marge_soshiki_output

# 
# Marge_Copyオブジェクトのインスタンスを呼び出し、
copy = Marge_Copy()
# 出力先のファイル名を取得する。
export_file = copy.get_export_file_name()

# 前回作業用のマージ対象一覧ファイルの削除
marge = Marge_filelist()

# マージ作業対象一覧ファイルの作成
work_file_list = marge.get_work_file()


# 開始行の定義
s_param = Marge_soshiki_set()
startnum = s_param.read_start()
soshiki_max_count = s_param.out_start_row()

# データのマージ作業インスタンスを呼び出し、実行、マージ結果ファイルを保存する。
r_marge = Marge_soshiki_output(work_file_list,export_file,startnum,soshiki_max_count)
r_marge.main()
