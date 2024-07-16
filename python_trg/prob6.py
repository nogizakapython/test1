# 課題6
# 「レスポンスなう」回答メンバーを出力する

def input_count(array1):
    n = 0
    while True:
        print("「レスポンスなう」に回答する人数を入力してください。")
        print(f"1から{len(array1)}までの数で入力してください")
        try:
            num = int(input())
        except:
            print("文字列を入力しないでください")
        if num < 1 or num > len(array1):
            print(f"1人以上{len(array1)}人以下で設定してください")
        else:
            n = num
            break
    return n        

def output_answer_member(w_array,count):
    print("--------ここから下にレスポンスなう回答対象者が出力されます---------")
    for i in range(count):
        print(w_array[i])

def main():
    import random

    xteam_member = ["shigeki.ohtake","ryota.nozawa","yuichi.kimura","tomoki.nakano",
                    "riamu.daikusu","rintaro.watanabe","shinsuke.eto","shunsuke.taniguchi",
                    "kazuma.motoyama","yumi.terui","rei.hasegawa","takuma.fukazawa",
                    "kazuma.nishikawa","kentaro.ohura","takumi.kurematsu","takashi.muramatsu",
                    "shingo.a.maeda","takao.hattori","eri.wakabayashi","hironori.tanikawa"] 
    
    

    random.shuffle(xteam_member)

    n = input_count(xteam_member)

    
    output_answer_member(xteam_member,n)

if __name__ == "__main__":    
    main()
