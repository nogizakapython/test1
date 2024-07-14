num = gets.to_i
data = gets.chomp
array1 = data.split(' ')
len1 = array1.length()
array2 = []

for i in 0...len1-1 do
  before_d = array1[i]
  after_d = array1[i+1]
  if before_d == "2" and after_d == "0" then
    array2.push(i+1)
  end
end
len2 = array2.length()
ans = ""
if len2 == 0 then
  ans = ans + "-1"
else
  for j in 0...len2 do
    if j == len2-1 then
      ans = ans + array2[j].to_s
    else
      ans = ans + array2[j].to_s + " "
    end
  end
end

puts ans
