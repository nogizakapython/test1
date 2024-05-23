str1 = gets.chomp
str2 = gets.chomp
array1 = str1.split("")
array2 = str2.split("")
num1 = array1.length
num2 = array2.length
ans = ""
for i in 0...num2 do
    char1 = array2[i]
    char2 = char1.upcase
    char3 = char2.downcase
    for j in 0...num1 do
        target_s = array1[j]
        if char2 == target_s then
            ans = ans + char2
        elsif char3 == target_s then
            ans = ans + char3
        end

    end
end

puts ans
