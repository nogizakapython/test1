################################
#  ヒアドキュメントテスト
#  新規作成  2024/6/7
################################

# メイン関数
def main():
    nogi_oshimen = "遠藤さくら"
    sakura_oshimen = "田村保乃"
    hinata_oshimen = "正源司陽子"
    count = 0
    # ヒアドキュメント用ファイルを開き、テキスト内の変数を代入する   
    with open('text2.txt', encoding='utf-8') as f:
        for line in f:
            line = line.replace("\n",'')
            oshimen = ""
            if count == 0:
                oshimen = f"""{line.format(nogi_oshimen=nogi_oshimen)}"""
            elif count == 1:
                oshimen = f"""{line.format(sakura_oshimen=sakura_oshimen)}"""   
            elif count == 2:
                oshimen = f"""{line.format(hinata_oshimen=hinata_oshimen)}"""      
            # 1行ごとにヒアドキュメントの中身を表示する。
            print(oshimen)        
            count += 1

    
if __name__ == "__main__":
    main()