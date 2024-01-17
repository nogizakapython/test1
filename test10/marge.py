#######   人事異動シートマージ処理      ######
#######   新規作成   2024/1/16         ######
#######   作成者     takao.hattori     ######
#############################################

import marge_jinji
import marge_soshiki

try:
    exec(marge_jinji)
    exec(marge_soshiki)
except:
    str100 = 11    