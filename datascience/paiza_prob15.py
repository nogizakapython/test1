import pandas as pd


s = pd.Series({"a": 1, "b": 4, "c": 7})
print(s[( s > 2) & (s < 7)])