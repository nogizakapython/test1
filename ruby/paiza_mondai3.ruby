number = gets.to_i
if number < 100
    puts "#{number}は100より小さい"
elsif number < 200
    puts "#{number}は100以上200より小さい"
else
    puts "#{number}は200以上"
end
