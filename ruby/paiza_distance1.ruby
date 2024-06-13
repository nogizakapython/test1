data1 = gets.chomp
array1 = data1.split(' ')
N = array1[0].to_i
D = array1[1].to_i
data2 = gets.chomp
array2 = data2.split(' ')
X = array2[0].to_i
Y = array2[1].to_i
count = 0
for i in 0...N do
    data3 = gets.chomp
    array3 = data3.split(' ')
    x = array3[0].to_i
    y = array3[1].to_i
    dis_x = X - x
    dis_y = Y - y
    if dis_x < 0 then
        dis_x *= -1
    end
    if dis_y < 0 then
        dis_y *= -1
    end
    dis = dis_x + dis_y
    if dis <= D then
        count += 1
    end
end
puts count
