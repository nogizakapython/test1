# しりとりプログラム
# 名鉄でんちゃん
#  2024/1/25
# データ数を入力する
def error_msg()
  puts "正の整数を入力してください"
end

def correct(num1,num2)
  if num1 == num2 then
    puts "Yes"
  end
end

puts "正の整数を入力してください"
while true
  data1 = gets.chomp
  begin
    num = data1.to_i
    if num < 1 then
      puts "1未満の整数が入力されています"
      error_msg()
    else
      break
    end
  rescue
    error_msg()

  end
end

a_str = ""
b_str = ""
count = 1
for i in 0...num do
    puts "文字を入力してください"
    data2 = gets.chomp
    N = data2.length
    a_str = data2[0]
    #puts a_str
    if i == 0 then
        b_str = data2[N-1]
    else
        if a_str == b_str then
            #puts count
            b_str = data2[N-1]
            count += 1
        else

            output_b_str = b_str
            output_a_str = a_str
            msg = output_b_str + " " + output_a_str
            puts msg
            break
        end
    end
end

correct(num,count)
