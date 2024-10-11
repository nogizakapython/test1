num = gets.to_i
data = gets.chomp
array1 = data.split(' ')
array2 = []
a_count = 0
b_count = 0
for i in 0...num do
    str1 = array1[i]
    if str1 == "A" then
        a_count += 1
    else
        b_count += 1
    end
end
for str1 in array1 do
    if array2.include?(str1) then
        next
    else
        array2.push(str1)
    end
end

ans = array2.length()
puts ans
