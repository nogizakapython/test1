input_line = gets
array1 = input_line.split(' ')
A = array1[0].to_i
B = array1[1].to_i
sa = A - B
seki = A * B
puts sa.to_s + " " + seki.to_s
