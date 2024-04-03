##################################################
#    IC Energy 石油関連企業6社ニュースリリース(岩谷産業はIRニュースも含む)　統合バッチ処理
#    新規作成 : 2024/3/5
#    Modefy   : 2024/3/29  岩谷産業IRニュースを追加
#    Create by : takao.hattori
##################################################


import ic_cosmo
import ic_idemitsu
import ic_eneos
import ic_iwatani
import ic_iwatani_ir
import ic_taiyo
import ic_inpex


try:
    exec(ic_cosmo)
    exec(ic_idemitsu)
    exec(ic_eneos)
    exec(ic_iwatani)
    exec(ic_iwatani_ir)
    exec(ic_taiyo)
    exec(ic_inpex)
except TypeError:
    str1 = "動作に問題ございません"    