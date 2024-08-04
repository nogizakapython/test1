num = gets.to_i
array1 = []
count = 0
for i in 0...num do
    data1 = gets.chomp
    array2 = data1.split(' ')
    f = array2[0]
    s = array2[1]

    if f != "y" || s != "y" then
        count += 1
        array1.push(i+1)
    end
end

puts count
if count > 0 then
    for j in array1 do
        puts j
    end
end
