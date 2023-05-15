# 新規作成 2023/5/16
# 計算プログラム

ans = 0
def times(num)
  ans = num * 2
  return ans
end

def devise(num)
  ans = num / 2
  return ans
end

puts "好きな整数を1つ入力してください"
number = gets.to_i
number = times(number)
number = devise(number)
puts number
