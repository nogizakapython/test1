#######   人事異動シートのマージファイルのコピー処理    ######
#######   新規作成   2024/1/16         #####################
#######   作成者     takao.hattori     #####################
#######   クラスファイルの用途
#######    テンプレートマージファイルをコピーし、マージ作業日の
#######    日付のマージファイルを作成する。
#######
#######   クラスファイルの使い方        
#######   (1) 下記のコードを記載して、クラスファイルを読み込む
#######   　　from marge_templatecopy import Marge_Copy
#######   (2)　インスタンスを読み込む
#######       export_file = Marge_Copy.temp_copy()
############################################################
 

class Marge_Copy:
    from datetime import datetime
    global b_export_file
    global export_file
    b_export_file = "PRD JP_人事異動・組織改編情報List_yyyymmdd.xlsx"
    # マージファイルの変数定義
    # マージ作業日の取得
    dt = datetime.now()
    date1 = ""
    while True:
        print("提出年月日を年西暦4桁、月2桁、日2桁で入力してください")
        print("2024年1月9日の場合は「20240109」と入力してください")
        try:
            date1 = input()
            date2 = int(date1)
            if len(date1) != 8:
                raise ValueError
            else:
                break
        except ValueError as e:
            print("提出年月日を年西暦4桁、月2桁、日2桁で入力してください")    

    #date1 = dt.strftime('%Y%m%d')
    export_file = "PRD JP_人事異動・組織改編情報List_" + date1 + ".xlsx"
    # マージ先テンプレートファイルからコピーする。
    def temp_copy(self):
        
        import shutil
        shutil.copy(b_export_file,export_file)
        # テンプレート作業用ファイル名を返り値で返す。    
        
    
    # 出力先ファイル名を返すメソッド
    def get_export_file_name(self):
        return export_file