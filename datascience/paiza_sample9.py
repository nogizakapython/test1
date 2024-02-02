import pandas as pd


s = pd.Series({"a": 3, "b": 1, "c": 2})
#print(s[s > 1])
p = pd.Series([True,True,False])
q = pd.Series([True,False,False])

print(p & q)
print()

print(p | q)
print()

print(~p)
print()

t = pd.Series([3,5,15])
print(t[(t % 3 == 0) & (t % 5 == 0)])