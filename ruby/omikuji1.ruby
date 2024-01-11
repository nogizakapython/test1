########################################
# おみくじプログラム           #########
########################################

puts "正の整数を入力してください"
num = 0
flag1 = 0
while flag1 == 0 do
  # 0以下の整数と整数以外が入力されたら例外処理で再度整数入力を促す
  begin
    input1 = gets
    num = input1.to_i
    if num > 0 then
      flag1 = 1
    else
      raise StandardError.new()
    end
  rescue => e
    e = "0以下の整数および整数以外は入力できません"
    puts e
  end
end
# 入力した正の整数を5で割る
ans = num % 5
# 5で割った余りでおみくじの結果を表示する。
if ans == 0
    puts("大吉")
elsif ans == 1
    puts("中吉")
elsif ans == 2
    puts("吉")
elsif ans == 3
    puts("小吉")
elsif ans == 4
    puts("凶")

end
