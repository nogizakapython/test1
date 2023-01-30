# 自分の得意な言語で
# Let's チャレンジ！！
input_line = gets
array1 = input_line.split(' ')
num = array1.length
ans = ""
for i in 0...num do
    if i % 3 == 2
        ans = ans + array1[i].to_s
        puts ans
        ans = ""
    else
        ans = ans + array1[i].to_s + " "
    end
end
