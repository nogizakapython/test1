n,l = map(int,input().split(" "))
array1 = list(map(int,input().split(' ')))
array1.sort(reverse=True)
sum1 = 0


for i in range(len(array1)):
    data = array1[i]
    if i == 0:
        if data >= l:
            sum1 += int(data / 2)
        else:
            sum1 += data
    else:
        sum1 += data
    
print(sum1)