# 文字の左から何番目の文字を取り出す
# 標準入力
input_line = gets
# 文字列を1文字ずつ配列に格納する
array1 = input_line.split('')
#
num = gets.to_i
# 表示する
puts array1[num-1]
