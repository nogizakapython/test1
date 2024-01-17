#####################################################
######   日経人事異動情報取得バッチファイル
######   新規作成   2023/12/20 takao.hattori  #######
######   修正       2024/1/9   takao.hattori TypeErrorの例外処理を追加
#####################################################
import nikkeitest5
import nikkeitest6
import nikkeitest7
import nikkeitest8
import nikkeitest9

### 例外処理の追加
try:
    exec(nikkeitest5)
    exec(nikkeitest6)
    exec(nikkeitest7)
    exec(nikkeitest8)
    exec(nikkeitest9)
except TypeError as e:
    str1 = e     

