#######   人事異動、マージ対象作業ファイルリスト作成処理    ######
#######   新規作成   2024/1/16         #####################
#######   作成者     takao.hattori     #####################
#######   クラスファイルの用途
#######    テンプレートマージファイルをコピーし、マージ作業日の
#######    日付のマージファイルを作成する。
#######
#######   クラスファイルの使い方        
#######   (1) 下記のコードを記載して、クラスファイルを読み込む
#######   　　from marge_dirList import Marge_filelist
#######   (2)　インスタンスを読み込む
#######       <1> 前回のマージ対象リストファイルを削除メソッド
#######       Marge_filelist.del_tempfile()
#######       <2> 今回のマージ対象リストファイルの作成メソッド
#######       work_file_list = Marge_filelist.create_dir()
#######       
############################################################

class Marge_filelist:
    #マージ対象の作業ファイル名変数をグローバル変数で定義する。
    global work_file_list
    work_file_list = "margedirfile.txt"
    
    # 古いマージファイル対象一覧ファイル削除処理メソッド
    def del_tempfile(self):
        import os
        # 古いマージ対象ファイルの存在を確認し、存在したら削除する。
        result1 = os.path.isfile(work_file_list)
        if result1:
            #例外処理(削除用対象のファイルを開いているとき対応)
            try:
                os.remove(work_file_list)
            except:
                print(f"{work_file_list}の削除に失敗しました。")    
    
    # マージ対象ファイル一覧ファイルの作成メソッド                
    def create_file(self):
        #ライブラリを読み込む
        import re
        import os
        #作業フォルダのファイル一覧をリストで取得する。
        list1 = os.listdir()
        # マージ対象ファイルを一時ファイルに保存する。作業者の名前付きファイルのみを一時ファイルに書き込む
        with open(work_file_list,mode="a",encoding="utf-8") as f:
            # リストの要素を取り出し、マージ元ファイルリストファイルに書き込む
            for filename in list1:
                #(名前)で始まるファイル名を正規表現で取得する。
                result2 = re.match('（',filename)
                if result2:
                    f.write(filename + "\n")
        # ファイルを閉じる(例外処理)
            f.close()
    
    def get_work_file(self):      
        #ファイル名を返り値で返す            
        return(work_file_list)            