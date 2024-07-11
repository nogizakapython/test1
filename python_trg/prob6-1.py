# 乃木坂3期生メンバーシャッフル
# 好きな順にメンバーを出力する

# 配列の要素出力関数
def output_answer_member(w_array,count):
    print("--------ここから下に乃木坂3期生メンバーを好きな順に出力されます---------")
    for i in range(count):
        print(w_array[i])

# メイン関数
def main():
    # ライブラリを読み込む
    import random
    # 乃木坂46の3期メンバー配列
    nogizaka_member3 = ["梅澤美波","与田祐希","久保史緒里","岩本蓮加",
                    "佐藤楓","大園桃子","山下美月","阪口珠美",
                    "向井葉月","中村麗乃","吉田綾乃クリスティー","伊藤理々杏"] 
    
    # 要素数変数
    n = 0
    # 配列の要素をシャッフルする
    random.shuffle(nogizaka_member3)

    while True:
        print("乃木坂3期生メンバーを好きな順に何人表示するか人数を入力してください")
        print(f"1から{len(nogizaka_member3)}までの数で入力してください")
        # 数値以外が入力されたら例外処理
        try:
            num = int(input())
        except:
            print("文字列を入力しないでください")
        #　指定された人数が要素数より少ない、及び多いチェック 
        if num < 1 or num > len(nogizaka_member3):
            print(f"1人以上{len(nogizaka_member3)}人以下で設定してください")
        else:
            n = num
            break
    # 結果関数を呼び出す
    output_answer_member(nogizaka_member3,n)
# メイン関数を呼び出す 
main()
