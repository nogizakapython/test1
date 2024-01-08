
puts "データの入力個数を入力してください"
num1 = gets
num = num1.to_i
array1 = []
for i in 0...num do
  data = gets
  array1.push(data)
end

num2 = array1.length
for j in 0...num2 do
    puts array1[j]
end
