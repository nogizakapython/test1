# Let's チャレンジ！！
input_line = gets
num = input_line.to_i
array1 = []
for i in 0...num do
    data = gets.chomp
    array1.push(data)
end

l = array1.tally
key = l.keys
value = l.values
n = key.length
max_man = ""
max_count = 0
for i in 0...n do
    man = key[i]
    cnt = value[i].to_i
    if cnt > max_count then
        max_man = man
        max_count = cnt
    end
end

puts max_man
