# ゼロ・プラス・マイナスを繰り返し判定する

count = gets.to_i
puts count
count.times do
    number = gets.to_i
    if number > 0
        puts "#{number}はプラス"
    elsif number == 0
        puts "#{number}は0"
    else
        puts "#{number}はマイナス"
    end
end
