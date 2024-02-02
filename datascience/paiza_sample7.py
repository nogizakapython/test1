import pandas as pd


s = pd.Series({"nogizaka": 31, "sakurazaka": 22, "hinatazaka": 25})
t = pd.Series({"sakurazaka": 71, "nogizaka": 52, "hinatazaka": 43})

print(s)
print()
print(t)
print()
print(s + t)


print(s / t)
print()
print(s % 10)
print()

p = pd.Series({"str1":"shinuchi","str3":"shiraishi","str2":"yamashita"})
q = pd.Series({"str1":" mai","str2":" mizuki","str3":" mai"})

print(p + q)
