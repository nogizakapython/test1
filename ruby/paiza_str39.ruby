input_line = gets.chomp
array1 = input_line.split(' ')
N = array1[0].to_i
M = array1[1].to_i
data1 = gets.chomp
array2 = data1.split(' ')
data2 = gets.chomp
array3 = data2.split(' ')
start1 = 0
end1 = 0
ans = ""


for i in 0...M do
    num1 = array3[i].to_i
    end1 = end1 + num1
    for j in start1...end1 do
        A = array2[j].to_s
        if j == end1 -1 then
            ans = ans + A

        else
            ans = ans + A + " "
        end
    end
    puts ans
    ans = ""
    start1 = end1


end
