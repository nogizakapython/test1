# 配列をシャッフルに並べる方法

# 配列の要素を１つずつ出力する関数
def output_elm(w_array):
    for elm in w_array:
        print(elm)
    print("-------------")

# メイン関数
def main():
    import random
    # randomライブラリを読み込む
    import random
    # 配列を定義し、配列の要素を定義する。
    array1 = ["生麦","立川","中津","弁天町"]
    # 配列の要素を1行ずつ出力する関数
    output_elm(array1)
    # 配列の要素の並び方をシャッフルに並び替える
    random.shuffle(array1)
    # 配列の要素を1行ずつ出力する関数
    output_elm(array1)
# main関数を呼び出す
main()