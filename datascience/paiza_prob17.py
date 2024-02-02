import pandas as pd


s = pd.Series({"a": 2, "b": 1, "c": 3})
print(s.sort_values(ascending=False))