import ic_cosmo
import ic_idemitsu
import ic_eneos
import ic_iwatani
import ic_taiyo
import ic_inpex


try:
    exec(ic_cosmo)
    exec(ic_idemitsu)
    exec(ic_eneos)
    exec(ic_iwatani)
    exec(ic_taiyo)
    exec(ic_inpex)
except TypeError:
    str1 = "動作に問題ございません"    