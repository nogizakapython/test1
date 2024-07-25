n = gets.to_i
hour = 0
minute = 0
wm = 0
for i in 0...n do
    data = gets.chomp
    array1 = data.split(' ')
    time1 = array1[0]
    time_array1 = time1.split(":")
    hour1 = time_array1[0].to_i
    minute1 = time_array1[1].to_i
    wm1 = hour1 * 60 + minute1
    time2 = array1[1]
    time_array2 = time2.split(":")
    hour2 = time_array2[0].to_i
    minute2 = time_array2[1].to_i
    wm2 = hour2 * 60 + minute2
    wm += wm2 -wm1
end
hour = (wm / 60).to_s
minute = (wm % 60).to_s
puts (hour + " " + minute)
