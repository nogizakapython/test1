####################################################
####    FB原因件数取得クラス                  ######
####    新規作成  :  2024/4/12                ######
####    Create By  takao.hattori              ######
####################################################
####    クラスの使い方                         ######
####    ① FBシートの開始行、終了行、案件名、作業者、FBシートのファイル名、FB集計結果ファイル名を引数に指定して
####      インスタンスを呼ぶ
####    ex)
####    reason_output = Get_Reason_file_output(start_fb_count,end_fb_count,project_name,work_name,file_name,result_file) 
####    ② FBリスト配列、工程名を引数にして、get_reason_file_outputメソッドを呼ぶ
####    ex)
####    reason_output.get_reason_file_output(fb_array,process_name)
####################################################

class Get_Reason_file_output():
    # インスタンス
    def __init__(self,start_fb_count,end_fb_count,project_name,work_name,file_name,result_file):
         self.__start_fb_count__ = start_fb_count
         self.__end_fb_count__ = end_fb_count
         self.__project_name__ = project_name
         self.__work_name__ = work_name
         self.__file_name__ = file_name
         self.__result_file__ = result_file
    # メソッド  
    def get_reason_file_output(self,fb_array,process_str):
        import openpyxl as op
        import codecs
        from output_csv_file import Output_csv_file
        wb = op.load_workbook(self.__file_name__)
        feedback_sheetname = 'FB'
        wf = wb[feedback_sheetname]
        reason_count = 0
        for reason in fb_array:
            for i in range(self.__start_fb_count__,self.__end_fb_count__+1):
                data_str = wf.cell(row=i,column=11).value
                if data_str == reason:
                    reason_count += 1
            output_csv = Output_csv_file(self.__result_file__,self.__project_name__,self.__work_name__,reason,reason_count)        
            if self.__project_name__ == "I&D" or self.__project_name__ == "JPiT myTE":
                output_csv.output_process_csv(process_str)
            else:                
                output_csv.output_no_process_csv()
            reason_count = 0