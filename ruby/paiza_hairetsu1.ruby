array1 = [1,10,2,9,3,8,4,7,5,6]
length1 = array1.length()
for i in 0...length1 do
    data = array1[i].to_i
    if data == 8 then
        puts i + 1
    end
end
