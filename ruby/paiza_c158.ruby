# 自分の得意な言語で
# Let's チャレンジ！！
data1 = gets.chomp
array1 = data1.split(' ')
n = array1[0].to_i
m = array1[1].to_i
array2 = []
array3 = []
sum = 0
for i in 0...n do
    data2 = gets.chomp
    array2.push(data2)
end
leng2 = array2.size()

for j in 1...m+1 do
    w_price = 0
    count = 0
    for k in 0...leng2 do
        data3 = array2[k]
        #puts data3
        w_array = data3.split(' ')
        month = w_array[0].to_i
        price = w_array[1].to_i
        if j == 1 then
            count += 1
            w_price += price
        elsif month == 1 then
            count += 1
            w_price += price
        elsif month >= 2 and j % month == 1 then
            count += 1
            w_price += price
        end
    end
    #puts w_price

    if count == 2 then
        w_price *= 0.90
    elsif count >= 3 then
        w_price *= 0.85
    end

    sum += w_price.to_i
end
puts sum
