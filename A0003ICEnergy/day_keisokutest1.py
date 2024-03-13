from datetime import datetime
from datetime import timedelta


data1 = input("日付を西暦4桁、月2桁、日付2桁で入力してください。例) 2024年3月9日の場合は「20240309」と入力してください")
if len(data1) == 8:
    print("OK")
else:
    print("NG")


year = data1[:4]
print(year)
month = data1[4:6]
if int(month) < 1 or int(month) > 12:
    print("NG")
else:     
    print(month)
day = data1[6:]
if int(day) < 1 or int(day) > 31:
    print("NG")
else:     
    print(day)
str_ymd = year + "/" + month + "/" + day
ymd = datetime.strptime(str_ymd, '%Y/%m/%d')
array1 = []
dt = datetime.now()
day_sabun = dt - ymd
day_sabun = str(day_sabun)
sabun_array1 = day_sabun.split(" ")
day_sa = sabun_array1[0]
day_sa = int(day_sa)

for i in range(day_sa):
    w_ymd = ymd.strftime("%Y/%m/%d")
    array1.append(w_ymd)
    ymd = ymd + timedelta(1)

for j in array1:
    print(j)

    