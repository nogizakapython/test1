import pandas as pd

# 要素の削除
s = pd.Series({"a": 3, "b": 1, "c": 2})
s.pop("c")
print(s)