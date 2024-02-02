import pandas as pd

# 値の追加
s = pd.Series({"a": 3, "b": 1, "c": 2})
s["d"] = 813
print(s)