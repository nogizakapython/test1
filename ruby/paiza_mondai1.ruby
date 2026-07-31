# 自分の得意な言語で
# Let's チャレンジ！！
input_line = gets.chomp
array1 = input_line.split(' ')
N = 0
A = array1[0].to_i
N += A
B = array1[1].to_i
N *= B
C = array1[2].to_i
N = N % C
puts N
