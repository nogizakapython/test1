calory = gets.to_i
data = gets.chomp
array1 = data.split(' ')
count = array1.length()
sum_calory = 0
count.times do |i|
    data1 = array1[i].to_i
    sum_calory += data1
end

if sum_calory <= calory then
    puts "OK"
else
    puts "NG"
end
