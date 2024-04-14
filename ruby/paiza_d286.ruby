data = gets
array1 = data.split(' ')
X = array1[0].to_i
T = array1[1].to_i

puts ((T*60)/X).to_i
