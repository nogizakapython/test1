import pandas as pd

# indexオブジェクトの変更
s = pd.Series({"a": 3, "b": 1, "c": 2})
ind = ["d", "e", "f"]
s.index =ind
print(s)
