import pandas as pd 

s = pd.Series({"a":3,"b":1,"c":2})
# keyからValueを表示
print(s["a"])
print(s["b":"c"])
# 要素のインデックスからValueを表示
print(s[0])
print(s[0:2])
print(s[0:])