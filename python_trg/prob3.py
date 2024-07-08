# 課題3

# 行数を変数iと定義する
for i in range(1,10):
    # 列数を変数jと定義する
    for j in range(1,10):
        # iの数がjの数以上で、jが9未満の時、「■」を表示し、改行しない
        if i >= j and j < 9:
            print("■",end=" ")
        # iの数がjの数以上で、jが9の時、「■」を表示し、改行する    
        elif i >= j and j == 9:
            print("■")
        # iの数がjの数より小さくかつ、jが9未満の時、「□」を表示し、改行しない    
        elif i < j and j < 9:
            print("□",end=" ")
        # iの数がjの数より小さくかつ、jが9の時、「□」を表示し、改行する
        elif i < j and j == 9:
            print("□")            