####################################################
####    案件名取得クラス                       ######
####    新規作成  :  2024/4/11                ######
####    修正      :  2024/6/6 中計・決算50社追加 ####
####    Create By  takao.hattori              ######
####################################################
####    クラスの使い方
####    ①インスタンス変数にFBシートのファイル名を引数にして呼び出す
####    ex
####    proj = Get_project_Name(FBシートのファイル名)
####    ②get_project_nameメソッドを呼び出す
####    proj.get_project_name()
####################################################

class Get_Project_Name():
    # インスタンス
    def __init__(self,file_name):
        self.__file_name__ = file_name
    # 案件名取得メソッド
    def get_project_name(self):
        import re
        project_name = ""
        # レビューシートファイル名から案件名を取得する
        A0048_flag = re.search("A0048",self.__file_name__)
        SN_0025_flag = re.search("SN_0025",self.__file_name__)
        SN_0031_flag = re.search("SN_0031",self.__file_name__)
        SN_0052_flag = re.search("SN_0052",self.__file_name__)
        A0055_flag = re.search("A0055",self.__file_name__)
        if A0048_flag:
            project_name = "空調設備サーバールーム"
        if SN_0025_flag:
            project_name = "人事異動"
        if SN_0031_flag:
            project_name = "I&D"
        if SN_0052_flag:
            project_name = "JPiT myTE"
        if A0055_flag:
            project_name = "中計・決算50社"      
        # プロジェクト名を返す
        return project_name         