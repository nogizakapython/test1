import pandas as pd 

s = pd.Series({"a":3,"b":1,"c":2})
# INDEXにラベルを設定する
ind = ["a","c"]
print(s[ind])