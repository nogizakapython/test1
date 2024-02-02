import pandas as pd

# 値の更新
s = pd.Series({"a": 3, "b": 1, "c": 2})
s["b"] = 813
print(s)