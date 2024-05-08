input_line = gets.chomp
array1 = input_line.split(' ')
n = array1[0].to_i
mine = array1[1].to_i
for i in 0...n do
    enemy = gets.to_i
    if mine > enemy then
        mine += (enemy / 2).to_i
    elsif mine < enemy then
        mine = (mine / 2).to_i
    end
end
puts mine
