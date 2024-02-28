str1 = gets.chomp
data = gets.chomp
array1 = data.split(' ')
target_num = array1[0].to_i
target_char = array1[1]
str1[target_num - 1] = target_char
puts str1
