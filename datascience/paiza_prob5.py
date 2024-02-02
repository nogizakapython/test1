import pandas as pd


s = pd.Series({"c": 1, "d": 2, "e": 3})
# cとeの要素を取り出す。
ind = ["c", "e"]
print(s[ind])
