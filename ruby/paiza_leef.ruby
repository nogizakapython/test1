str1 = gets.chomp
leng = str1.length
str_array = str1.split("")
ans = ""

for i in 0...leng do
    ch = str_array[i]
    if ch == "A" then
        ans = ans + "4"
    elsif ch == "E" then
        ans = ans + "3"
    elsif ch == "G" then
        ans = ans + "6"
    elsif ch == "I" then
        ans = ans + "1"
    elsif ch == "O" then
        ans = ans + "0"
    elsif ch == "S" then
        ans = ans + "5"
    elsif ch == "Z" then
        ans = ans + "2"
    else
        ans = ans + ch
    end
end
puts ans
