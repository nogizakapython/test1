# 配列を初期化(配列の要素をすべて削除)する

# 引数で指定した配列をループ文を回して要素を表示する関数
def output_array_elm(array_name):
    for elm in array_name:
        print(elm)
    print("---------------------------")    

# 配列の要素を格納する
array1 = ["生麦","立川","中津","弁天町"]

# 配列の要素を表示する
output_array_elm(array1)

# 配列を初期化する(配列の要素をすべて削除する)
array1.clear()

# 配列の要素を表示する
output_array_elm(array1)
