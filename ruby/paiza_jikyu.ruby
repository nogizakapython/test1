data = gets.chomp
array1 = data.split(' ')
W = array1[0].to_i
M = array1[1].to_i
ans = (W / 60) * M
puts ans
