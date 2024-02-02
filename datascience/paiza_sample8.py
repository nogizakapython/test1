import pandas as pd

# indexのオブジェクト属性
s = pd.Series({"a": 3, "b": 1, "c": 2})
s.index = ["d","e","f"]
print(s)

q = pd.Series([3,1,2])
print(q)
print(q.index)

r = pd.Series([3,1,2],name="nums",dtype="float64")
print(r)
print(r.name)

new_r = r.rename("values")
print(new_r)

r.rename("values",inplace=True)
print(r)

r.index.name = "chars"
print(r)

print(r.dtype)