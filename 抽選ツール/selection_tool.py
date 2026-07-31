import random
import os

array1=["shingo.a.maeda","takao.hattori","hironori.tanikawa","eri.wakabayashi"]



result_file = "result.txt"
monday_in_charge = "" 
tuesday_in_charge = ""


if os.path.exists(result_file):
    os.remove(result_file)

loop_flag = False

monday_in_charge = random.choice(array1)

while loop_flag == False:
    tuesday_in_charge = random.choice(array1)
    if tuesday_in_charge != monday_in_charge:
        loop_flag = True

with open(result_file,'a') as fs:
    print(f"月、水、金の朝会のファシリ担当は{monday_in_charge}さんです",file=fs)
    print(f"火、木の朝会のファシリ担当は{tuesday_in_charge}さんです",file=fs)





