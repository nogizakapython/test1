signal = gets.chomp

case signal
when "red"
  puts "stop"
when "green"
  puts "go!"
when "yellow"
  puts "caution!"
else
  puts "wromng color"
end
