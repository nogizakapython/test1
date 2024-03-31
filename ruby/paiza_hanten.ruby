num = gets.to_i
input_line = gets.chomp
str_array = input_line.split(' ')
leng = str_array.length
start_num = leng - 1
i=start_num

while i > -1 do
    puts str_array[i]
    i -= 1
end
