



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
        while True:
            data_str = wf.cell(row=fb_data_count,column=11).value
            if data_str == None:
                end_fb_count = fb_data_count
                break
            else:
                fb_data_count += 1
        return end_fb_count        
