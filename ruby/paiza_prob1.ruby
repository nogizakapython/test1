input_name = gets.chomp
array1 = []
length1 = input_name.size()
ans = ""
t_ans = ""
count = 0
for i in 0...length1 do
    word1 = input_name[i]

    if word1 == "a" then
        count += 1
    end

    if word1 == "i" then
        count += 1
    end

    if word1 == "u" then
        count += 1
    end

    if word1 == "e" then
        count += 1
    end

    if word1 == "o" then
        count += 1
    end

    if word1 == "A" then
        count += 1
    end

    if word1 == "I" then
        count += 1
    end

    if word1 == "U" then
        count += 1
    end
    if word1 == "E" then
        count += 1
    end

    if word1 == "O" then
        count += 1
    end

    if count == 0 then
        ans = ans + word1
    end
    count = 0
end
puts ans
