# 課題5
# 簡易ブラックジャック


# 持ち点の計算
def calc_point(card):
    point = 0
    match card:
        case card if card == "A":
            if point > 11:
                point += 1
            else:
                point += 11
        case card if card == "J":
            point += 10
        case card if card == "Q":
            point += 10
        case card if card == "K":
            point += 10
        case _:
            point += int(card)
            
    return point

def game():
    # ライブラリのインポート
    import random
    # カード配列
    array1 = ["A","2","3","4","5","6","7","8","9","10","J","Q","K"]
    
    computer_point = 0
    computer_finish_flag = 0
    player_ans = 0
    player_point = 0
    while player_ans == 0:
               
        while True:
            print(f"現在のあなたの点数は{player_point}です")
            print("PLAYERさん、カードを1枚引きますか? 引く場合は0、終了する場合は1を入力してください")
            try:
                player_ans = int(input())
            except:
                print("文字列を入力したらあかん!0か1の数字を入力やで～")
                   
            if player_ans < 0 or player_ans > 1:
                print("0か1のどれか2つの数を入力してください")
            else:
                break
        
        
            
        if player_ans == 0:
            if computer_point >= 18:
                computer_finish_flag = 1
            if computer_finish_flag == 0:    
                c_rnd_num = random.randint(0,len(array1)-1)
                computer_card = array1[c_rnd_num]
                computer_point += calc_point(computer_card)
                
            p_rnd_num = random.randint(0,len(array1)-1)
            player_card = array1[p_rnd_num]
            player_point += calc_point(player_card) 

            if computer_point > 21 and player_point > 21:
                print("コンピュータ、あなた両社21点を超えたので引き分けです!")
                break
            elif computer_point > 21:
                print(f"コンピュータのポイントが21点を超えました。PLAYERの勝利です!")
                break
            elif player_point > 21:
                print(f"あなたのポイントが21点を超えました。PLAYERの敗北です!")
                break
           

    if computer_point <=21 and player_point <= 21:
        if computer_point > player_point:
            print(f"あなたの点数が{player_point}、コンピュータのポイントが{computer_point}であなたの敗北です")
        elif computer_point < player_point:
            print(f"あなたの点数が{player_point}、コンピュータのポイントが{computer_point}であなたの勝利です")
        elif computer_point == player_point:
            print(f"あなたの点数が{player_point}、コンピュータのポイントが{computer_point}で引き分けです")


game()


    