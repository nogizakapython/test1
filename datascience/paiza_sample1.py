# pandasの読み込み
import pandas as pd 
# Seriesの作成
# Dictionary(連想配列)
s = pd.Series({"a":3,"b":1,"c":2})
print(s)
# Seriesの初期化
ind = ["a","b","c"]
s2 = pd.Series(1,index=ind)
print(s2)


