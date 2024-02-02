import pandas as pd


s = pd.Series({"b": 3, "c": 1, "a": 2})

# インデックスのソート
print(s.sort_index())
print(s.sort_index(ascending=False))

# 値のソート
print(s.sort_values())
print(s.sort_values(ascending=False))