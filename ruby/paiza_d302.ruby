input_line = gets.chomp
array1 = input_line.split(' ')
D = array1[0].to_i
K = array1[1].to_i
if D <= 3 then
    C = 500
elsif D > 3 then
    C = 500 + (D-3) * K
end
puts C
