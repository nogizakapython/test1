# 課題4
# 2桁の数でヒット&ブロー
import random

num = random.randint(0,8)
array1 = ["1","2","3","4","5","6","7","8","9"]
c_array = []
y_array = []
y_hit = 0
y_blow = 0
y_count = 0
degree = 2

for i in range(2):
    length1 = len(array1)
    r_num = random.randint(0,length1-1)
    c_array.append(array1[r_num])
    array1.pop(r_num)


y_num = 0

while True:
    while True:
        print("２桁の数字を入力してください(10～99までの整数)")
        y_num = int(input())
        if y_num < 10 or y_num > 100:
            print("10から99までの整数を入力してください")
        else:
            break
    y_array = list(str(y_num))
    
    for i in range(degree):
        for j in range(degree):
            if i == j:
                if y_array[i] == c_array[j]:
                    y_hit += 1
            else:
                if y_array[i] == c_array[j]:
                    y_blow += 1
    if y_hit == 2:
        print("ヒット: " + str(y_hit))
        c_ans_s = ""
        for i in range(degree):
            c_ans_s = c_ans_s + c_array[i]
        c_ans = int(c_ans_s)
        print("正解は" + str(c_ans) + "です")    

        print("おめでとうございます。正解です")
        break
    else:
        print("ヒット: " + str(y_hit))
        print("ブロー: " + str(y_blow))
        y_array.clear()
        y_hit = 0
        y_blow = 0

