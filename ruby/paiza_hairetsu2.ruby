array1 = [1,5,9,7,3,2,4,8,6,10]
num = gets.to_i
length1 = array1.length()
for i in 0...length1 do
    data = array1[i].to_i
    if data == num then
        puts i + 1
    end
end
