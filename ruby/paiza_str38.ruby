num = gets.to_i
for i in 0...num do
    data = gets
    array1 = data.split(' ')
    A = array1[0].to_f
    B = array1[1].to_i
    str1 = "%#.0" + B.to_s + "f"
    ans = sprintf(str1,A)
    puts ans
end
