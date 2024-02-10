# 自分の得意な言語で
# Let's チャレンジ！！
str1 = gets.chomp
str2 = gets.chomp
num = gets.to_i
ans = ""
array1 = []
hcount = str1.size()
for i in 0...hcount do
    w_str = str1[i].to_s
    array1.push(w_str)
end

array1.insert(num,str2)
N = array1.size()
for j in 0...N do
    w_str2 = array1[j].to_s
    ans = ans + w_str2
end

puts ans
