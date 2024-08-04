num = gets.to_i
array1 = []
for i in 0...num do
  data = gets.chomp
  array1.push(data)
end

array1.each { |val| puts val }
