# 自分の得意な言語で
# Let's チャレンジ！！
input_line = gets
array1 = input_line.split(' ')
array2 = []
array3 = []
count = 0
seikai = 0
A = array1[0].to_i
B = array1[1].to_i
for i in A..B do
    str1 = i.to_s
    array2 = str1.split('')
    #puts(array2)
    num1 = array2.size
    for k in 0...num1 do
        if array2[k] == "0" then
            array3.unshift("0")
        elsif array2[k] == "1" then
            array3.unshift("1")
        elsif array2[k] == "6" then
            array3.unshift("9")
        elsif array2[k] == "8" then
            array3.unshift("8")
        elsif array2[k] == "9" then
            array3.unshift("6")
        else
            array3.unshift("X")
        end
    end
    for j in 0...num1 do
        str2 = array2[j]
        str3 = array3[j]
        #puts(str2)
        #puts(str3)
        if str2 == str3 then
            count += 1
        end

    end
    if count == num1 then
        seikai += 1
    end
    count = 0
    array3 = []
end
puts(seikai)
