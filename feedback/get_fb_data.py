####################################################
####    FBシート最終行取得クラス　　　　　　　  ######
####    新規作成  :  2024/4/12                ######
####    Create By  takao.hattori              ######
####################################################
####    クラスの使い方
####    ①インスタンス変数に開始行とファイル名を引数に設定して呼び出す
####    ex
####    get_final_row = Get_fb_Data(fb_data_count,file_name)
####    ②get_end_row_countメソッドを引数無しで呼ぶ
####    end_fb_count = get_final_row.get_end_row_count()
####
####################################################



class Get_fb_Data():

    def __init__(self,fb_data_count,file_name):
        self.__fb_data_count__ = fb_data_count
        self.__file_name__ = file_name

    def get_end_row_count(self):
        # 読み込み先エクセルファイルの変数定義
        import openpyxl as op 
        wb = op.load_workbook(self.__file_name__)
        feedback_sheetname = 'FB'
        wf = wb[feedback_sheetname]
        fb_data_count = self.__fb_data_count__
        # FBシートを読み込んで、FB指摘事項の最終行を取得する
        while True:
            data_str = wf.cell(row=fb_data_count,column=11).value
            if data_str == None:
                end_fb_count = fb_data_count
                break
            else:
                fb_data_count += 1
        #最終行を返す 
        return end_fb_count        
