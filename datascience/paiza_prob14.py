import pandas as pd

# データのフィルタリング
s = pd.Series({"a": 2, "b": 1, "c": 4})
print(s[s < 3])
