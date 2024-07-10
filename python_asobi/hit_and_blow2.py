# 課題4の改造版
# 3桁の数でヒット&ブロー
# 百の位に0は入らないように修正
# ライブラリの読み込み
import random

# 作り出す整数の定義(整数を文字列型で定義)
array1 = ["0","1","2","3","4","5","6","7","8","9"]
# コンピュータの配列
c_array = []
# プレイヤーの配列
y_array = []
# ヒット数変数
y_hit = 0
# ブロー数変数
y_blow = 0
# 桁数変数
degree = 3
# プレイヤー入力回数
p_count = 0

# コンピュータの数を決定する
for i in range(degree):
    length1 = len(array1)
    
    # 十の位が0にならないようにする
    while True:
        r_num = random.randint(0,length1-1)
        if i == 0:
            if r_num != 0:
                break
        else:
            break
    # コンピュータが設定した数をコンピュータ用配列に格納する 
    c_array.append(array1[r_num])
    # 使用した数を元の数配列から削除する。
    array1.pop(r_num)

# プレイヤーの入力整数変数の定義(整数のため初期値0)
y_num = 0

# プレイヤーがコンピュータで作成した2桁の数と一致するまでループを繰り返す
while p_count < 10:
    # プレイヤーの数字入力と入力チェック
    while True:
        print("3桁の数字を入力してください(100～999までの整数)")
        try:
            y_num = int(input())
        except:
            print("入力値に文字が含まれています")
            continue

        if y_num < 100 or y_num > 999:
            print("100から999までの整数を入力してください")
        else:
            break
    #　入力した整数を文字列に変換し、プレイヤー配列に格納する。 
    y_array = list(str(y_num))
    
    # コンピュータ配列とプレイヤー配列の要素番号が同じ場合(桁数が同じ)、ヒット比較
    # 要素番号が違う場合はブロー比較を実施する。

    for i in range(degree):
        for j in range(degree):
            if i == j:
                if y_array[i] == c_array[j]:
                    y_hit += 1
            else:
                if y_array[i] == c_array[j]:
                    y_blow += 1
    
    # ヒット数が3の時、コンピュータで作成した3桁の整数を当てたのでゲーム終了
    
    if y_hit == degree:
        print("ヒット: " + str(y_hit))
        c_ans_s = ""
        for i in range(degree):
            c_ans_s = c_ans_s + c_array[i]
        c_ans = int(c_ans_s)
        print(str(p_count) + "回挑戦")    

        print("おめでとうございます。正解です")
        break
    # ヒット数が2出ない時
    else:
        # 結果を出力
        print("ヒット: " + str(y_hit))
        print("ブロー: " + str(y_blow))
        # プレイヤー配列を初期化
        y_array.clear()
        # ヒット数変数を初期値の0にする
        y_hit = 0
        # ブロー数変数を初期値の0にする
        y_blow = 0
    p_count += 1    

# 10回挑戦し、失敗したとき、正解の3桁の数を表示
if p_count == 10:
    ans = ""
    for k in list(c_array):
        ans = ans + k

    ans = int(ans)
    print("10回に達しました")
    print(f"正解は{ans}です。")    