# 自分の得意な言語で
# Let's チャレンジ！！
n = gets.to_i
array1 = [500,100,50,10,5,1]
coin_c = 0
for data in array1
    ans = (n / data).to_i
    if ans >= 1
        n = n - data * ans
        coin_c += ans
    end

end
puts coin_c
