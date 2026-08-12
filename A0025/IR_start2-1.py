############  IR中期経営計画、決算バッチ　#########
############  新規作成   2024/3/25       #########
############  修正       2024/5/20 takao.hattori 大正製薬を調査対象外 #####
##################################################


import nissan
import nissan2
import ryohin
import santen
import santen2
import sevenandi
import shimano
import shionogi
import shiseido
import subaru
# import taisyo
import takashimaya
# import takeda
import toyota
import toyotabosyoku
import unicharm
import yazaki




try:
    exec(nissan)
    exec(nissan2)
    exec(ryohin)
    exec(santen)
    exec(santen2)
    exec(sevenandi)
    exec(shimano)
    exec(shionogi)
    exec(shiseido)
    exec(subaru)
    # exec(taisyo)
    exec(takashimaya)
    # exec(takeda)
    exec(toyota)
    exec(toyotabosyoku)
    exec(unicharm)
    exec(yazaki)



except TypeError as e:
    str1 = e
    