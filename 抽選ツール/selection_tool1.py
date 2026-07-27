import random


array1=["shingo.a.maeda","takao.hattori","hironori.tanikawa","eri.wakabayashi"]

monday_in_charge = "" 
tuesday_in_charge = ""

loop_flag = False

monday_in_charge = random.choice(array1)

while loop_flag == False:
    tuesday_in_charge = random.choice(array1)
    if tuesday_in_charge != monday_in_charge:
        loop_flag = True


print(f"月、水、金の朝会のファシリ担当は{monday_in_charge}さんです")
print(f"火、木の朝会のファシリ担当は{tuesday_in_charge}さんです")





