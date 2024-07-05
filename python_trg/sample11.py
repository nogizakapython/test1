# 乱数で、３で割り切れる整数が出現したら無限ループから抜け出す

import random

while True:
    num = random.randint(1,30)
    print(num)
    if num % 3 == 0:
        print("End")
        break