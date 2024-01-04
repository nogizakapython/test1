# 自分の得意な言語で
# Let's チャレンジ！！
input_line = gets
array1 = input_line.split(' ')
M = array1[0].to_f
p1 = array1[1].to_f
q1 = array1[2].to_f
ans1 = (M * p1 / 100).to_f
ans2 = (M - ans1).to_f
ans3 = (ans2 * q1 / 100).to_f
ans4 = (ans2 -ans3).to_f
puts ans4
