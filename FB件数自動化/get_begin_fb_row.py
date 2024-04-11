####################################################
####    FB指摘事項シート、開始行クラス         ######
####    新規作成  :  2024/4/11                ######
####    Create By  takao.hattori              ######
####################################################
####    クラスの使い方
####    ①インスタンス変数に引数なしで呼び出す
####    ex
####    begin_row = Get_Begin_fb_row()
####    ②工程がある場合、get_begin_process_row_countメソッドを呼ぶ
####    begin_row.get_begin_process_row_count()
####
####    ③工程がない場合、get_begin_process_row_countメソッドを呼ぶ
####    begin_row.get_begin_not_process_row_count()
####
####################################################



class Get_Begin_fb_row():

    def __init__(self):
        self.__fb_data_no_process_count__ = 9
        self.__fb_data_process_count__ = 10
    
    def get_begin_not_process_row_count(self):
        fb_data_count = self.__fb_data_no_process_count__
        return fb_data_count
    
    def get_begin_process_row_count(self):
        fb_data_count =  self.__fb_data_process_count__
        return fb_data_count

