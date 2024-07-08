# ２重ループ

for i in range(1,6):
    for j in range(1,6):
        if j < 5:
            print(f"{i}+{j}=" +  str(i+j),end=" ")
        else:
            print(f"{i}+{j}=" + str(i+j))
