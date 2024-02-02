import pandas as pd


def output(str):
    print(str)



s = pd.Series({"a": 3, "b": 1, "c": 2})

# 要素の値を変更
output(s)
s["a"] = 813
output(s)
# 要素の追加
s["d"] = 100
output(s)
# 要素の削除
del s["d"]
output(s)
# 削除
s.pop("a")
output(s)
s["a"] = 813
s.drop("a")
print()

output(s)

s["e"] = 220
output(s)