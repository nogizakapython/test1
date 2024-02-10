# 自分の得意な言語で
# Let's チャレンジ！！
str1 = gets.chomp
ans = ""
array1 = []
count1 = 0
num = str1.size()
for i in 0...num do
    str2 = str1[i]
    if str2 == "-" then
        if count1 == 0 then
            array1.push(str2)
            count1 += 1
        else
            count1 += 1
        end
    else
        array1.push(str2)
        count1 = 0
    end
end

N = array1.size()
for j in 0...N do
    str3 = array1[j].to_s
    ans = ans + str3
end

puts ans
