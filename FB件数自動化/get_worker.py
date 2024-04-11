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