require 'bigdecimal'
num = gets.to_i
data = gets.chomp
array1 = data.split(' ')
sum = 0
array2 = []
count1 = array1.size()
for i in 0...count1 do
    data2 = array1[i].to_i
    array2.push(data2)
end
count2 = array2.size()
max_value = array2.max
min_value = array2.min
totai_value = array2.sum
sum = totai_value - max_value - min_value
sum = sum.to_f
avg_value = (sum / (count2-2)).to_f
ans = BigDecimal(avg_value.to_s).floor(1).to_f
puts ans
#puts "%.1f" % avg_value
