A = gets.to_i
B = gets.to_i

ans = 0
count = 0
while ans < A
    ans += B
    count += 1
end
puts count
