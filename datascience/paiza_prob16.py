import pandas as pd


s = pd.Series({2: "c", 3: "b", 1: "a"})
print(s.sort_index())