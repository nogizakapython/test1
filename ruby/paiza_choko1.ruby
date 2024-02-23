data = gets.chomp
array1 = data.split(' ')
N = array1[0].to_i
M = array1[1].to_i
A = 0
B = 0
icol_count = 0
str1 = ""
yes_flag = 0
no_flag = 0

for i in 0...N do
    choko = gets.chomp
    array2 = []
    array2 = choko.split(' ')

    str1 = ""
    for j in 0...M do
        A = 0
        B = 0
        array3 = []
        for k in 0...j do
            #puts k
            A += array2[k].to_i
            array3.push("A")
        end
        for l in j...M do
            #puts l
            B += array2[l].to_i
            array3.push("B")
        end

        if A == B then
            count = array3.size()
            for i in 0...count do
                str1 = str1 + array3[i]

            end
            yes_flag += 1
            if yes_flag == 1 then
                puts "Yes"
            end
            puts str1

        end

        str1 = ""
    end
end
if yes_flag == 0 then
     puts "No"
end
