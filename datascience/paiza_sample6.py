import pandas as pd


s = pd.Series({"a": 3, "b": 1, "c": 2})
t = pd.Series({"b": 11, "c": 22, "a": 33})

print(s)
print()
print(t)
print()
print(s + t)

s = pd.Series({"a": 3, "b": 1, "c": 2})
t = pd.Series({"b": 11, "d": 22, "a": 33})

print(s + t)
print()
print(s * 10)
