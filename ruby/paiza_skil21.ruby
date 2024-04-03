input_line = gets
array1 = input_line.split(' ')
A = array1[0].to_i
B = array1[1].to_i
ans = 0
count = 0
while ans <= A
    ans += B
    count += 1
end
puts count
