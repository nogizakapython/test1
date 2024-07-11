# 乃木坂3期生メンバーシャッフル
# 好きな順にメンバーを出力する

def output_answer_member(w_array,count):
    print("--------ここから下に乃木坂3期生メンバーを好きな順に出力されます---------")
    for i in range(count):
        print(w_array[i])

def main():
    import random

    nogizaka_member3 = ["梅澤美波","与田祐希","久保史緒里","岩本蓮加",
                    "佐藤楓","大園桃子","山下美月","阪口珠美",
                    "向井葉月","中村麗乃","吉田綾乃クリスティー","伊藤理々杏"] 
    
    n = 0

    random.shuffle(nogizaka_member3)

    while True:
        print("乃木坂3期生メンバーを好きな順に何人表示するか人数を入力してください")
        print(f"1から{len(nogizaka_member3)}までの数で入力してください")
        try:
            num = int(input())
        except:
            print("文字列を入力しないでください")
        if num < 1 or num > len(nogizaka_member3):
            print(f"1人以上{len(nogizaka_member3)}人以下で設定してください")
        else:
            n = num
            break

    output_answer_member(nogizaka_member3,n)
    
main()
