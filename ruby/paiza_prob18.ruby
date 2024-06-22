count = gets.to_i

count.times do
  number = gets.to_i
  if number == 10
      puts "#{number}は10に等しい"
  elsif number > 10
      puts "#{number}は10より大きい"
  else
      puts "#{number}は10未満"

  end
end
