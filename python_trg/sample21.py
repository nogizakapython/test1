# 関数を作成する

# 時間ごとにあいさつが変わる関数
def output_msg():
    import datetime
    dt = datetime.datetime.now()
    hour = int(dt.strftime('%H'))
    if hour < 12:
        msg1 = "おはようさん"
    elif hour >= 12 and hour < 18:
        msg1 = "こんにちは～"
    else:
        msg1 = "こんばんわんこ"        
    print(msg1)    


output_msg()