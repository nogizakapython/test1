num = gets.to_i
A_win_count = 0
num.times do |i|
  data = gets.chomp
  array1 = data.split(' ')
  A = array1[0]
  B = array1[1]
  if A == "G" && B == "C" then
    A_win_count += 1
  end
  if A == "C" && B == "P" then
    A_win_count += 1
  end
  if A == "P" && B == "G" then
    A_win_count += 1
  end
end

puts A_win_count
