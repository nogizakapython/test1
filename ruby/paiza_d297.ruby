count = 0
for i in 0...3 do
    data = gets.to_i
    if data >= 20 then
        count += 1
    end
end

if count == 3 then
    puts "OK"
else
    puts "NG"
end
