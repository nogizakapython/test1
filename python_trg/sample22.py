# 関数の引数と返り値(リターンコード)

# 加算関数
def add(a,b):
    ans = a + b
    return ans

# 減算関数
def sub(a,b):
    ans = a - b
    return ans 

# 乗算関数
def mul(a,b):
    ans = a * b
    return ans

def div(a,b):
    ans = a / b
    return ans


x = 10
y = 5
add_ans = add(x,y)
sub_ans = sub(x,y)
mul_ans = mul(x,y)
div_ans = int(div(x,y))
print(f"足し算の結果は{add_ans}、引き算の結果は{sub_ans}、掛け算の結果は{mul_ans}、割り算の商の結果は{div_ans}です")


