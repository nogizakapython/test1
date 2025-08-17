# 自分の得意な言語で
# Let's チャレンジ！！
str1 = gets.chomp
str2 = gets.chomp
array1 = str1.split(' ')
array2 = str2.split(' ')
t_point = array1[1].to_i
#puts t_point
c_point = 0
for num in array2
    num1 = num.to_i
    c_point += (num1 / t_point).to_i
end
#puts c_point
if c_point >= 100 then
    puts 0
else
    puts (100 - c_point) * t_point
end
