# 文字列の最後の文字を出力する
# 新規作成 2023/5/15

puts "文字を入力してください"
str = gets.chomp
# 文字数を取得する
num = str.length
# 1番最後の文字を出力する
puts str[num-1]

