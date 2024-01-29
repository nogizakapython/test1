puts "一致させたい文字を入力してください"
str1 = gets.chomp
puts "検索する文字数を入力してください"
num = gets.to_i
puts "検索対象の文字列を半角スペース区切りで入力してください"
data1 = gets
array1 = data1.split(' ')
count = array1.size()
flag1 = 0
for i in 0...count do
  str2 = array1[i]
  if str1 == str2 then
    flag1 = 1
  end
end

if flag1 == 1 then
  puts "Yes"
else
  puts "No"
end
