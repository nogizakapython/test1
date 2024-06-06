####################################################
####    作業担当者取得クラス                  ######
####    新規作成  :  2024/4/11                ######
####    Create By  takao.hattori              ######
####################################################
####    クラスの使い方
####    ①インスタンス変数にファイルリストを引数に渡す
####    ex
####    f = Make_FBfilelist(リストファイル名)
####    ②get_workerメソッドを呼び出す
####    f.get_worker()
####################################################


class Get_worker():

    def __init__(self,file_name):
        self.__file_name__ = file_name

    def get_worker(self):
        import openpyxl as op
        feedback_sheetname = 'FB'
        wb = op.load_workbook(self.__file_name__)
        wf = wb[feedback_sheetname]
        work_name = wf.cell(row=4,column=5).value
        return work_name    