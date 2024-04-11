####################################################
####    FBシート一覧ファイルリスト作成クラス   ######
####    新規作成  :  2024/4/11                ######
####    Create By  takao.hattori              ######
####################################################
####    クラスの使い方
####    ①インスタンス変数にファイルリストを引数に渡す
####    ex
####    f = Make_FBfilelist(リストファイル名)
####    ②make_listfikeメソッドを呼び出す
####    f.make_listfile(検索する文字列)
####################################################

class Make_FBfilelist():
    
    def __init__(self,fblist_file):
        self.__fblist_file__ = fblist_file

    # FBシートファイル一覧リストを作成する
    def make_listfile(self,patturn1):
        # クラスモジュールを読み込む
        import glob
        import codecs 
        # 案件番号配列
        project_array = ["A0048","SN_0025","SN_0031","SN_0052"]
        # FBシートファイル一覧リストを作成する。
        for file in project_array:
            file_patturn1 = file + patturn1
            filemsg = glob.glob(file_patturn1)
            for str1 in filemsg:
                print(str1,file=codecs.open(self.__fblist_file__,'a','utf-8'))
