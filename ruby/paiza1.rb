# 自分の得意な言語で
# Let's チャレンジ！！
num = gets.to_i 
data = gets 
array1 = data.split(' ')
count = array1.length 
for i in 0...count do
    num2 = array1[i]
    str1 = ""
    for j in 1..num2.to_i do 
        if j === num2.to_i 
            str1 = str1 + j.to_s
        else   
            str1 = str1 + j.to_s + " "
        end    
    end 
    puts str1 
end     