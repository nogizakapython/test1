####################################################
####    FB集計結果CSVファイル作成クラス        ######
####    新規作成  :  2024/4/15                ######
####    Create By  takao.hattori              ######
####################################################
####    クラスの使い方                         ######
####    ① 出力先ファイル名、案件名、作業者、FB理由、FB理由別件数
####      を引数にしてインスタンスを呼ぶ
####    ex)
####    output_csv = Output_csv_file(self.__result_file__,self.__project_name__,self.__work_name__,reason,insident_count)
####    ② MyTE、I&Dの場合、工程名を引数にして、output_csvメソッドを呼ぶ
####    ex)
####     output_csv.output_process_csv(process_str)
####    ③ ②以外の場合、引数なしで、output_csvメソッドを呼ぶ
####     output_csv.output_process_csv()
####################################################

class Output_csv_file():
    
    def __init__(self,result_file,project_name,work_name,reason,reason_count):
        self.__result_file__ = result_file
        self.__project_name__ = project_name
        self.__work_name__ = work_name
        self.__reason__ = reason
        self.__reason_count__ = reason_count

    def output_no_process_csv(self):
        msg = self.__project_name__ + "," + self.__work_name__ + "," + self.__reason__ + "," + str(self.__reason_count__)
        Output_csv_file.make_csv_file(self,msg)

    def output_process_csv(self,process_str):
        msg = self.__project_name__ + "," + process_str + "," + self.__work_name__ + "," + self.__reason__ + "," + str(self.__reason_count__)
        Output_csv_file.make_csv_file(self,msg)        

    def make_csv_file(self,msg):
        import codecs
        print(msg,file=codecs.open(self.__result_file__,'a','shift-jis'))    