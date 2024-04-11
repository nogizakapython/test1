from fb_not_reason import FB_not_process_Reason 

class FB_process_Reason(FB_not_process_Reason):
    
    def make_reason_list(self):
        # ライブラリの読み込み
        import openpyxl as op
        # FB理由が記載されているシート名の取得
        list_sheetname = 'List'
        # FB理由開始行
        fb_reason_count = 3
        # FB理由配列
        reason_list = []
        # FBシートのエクセルファイルの定義
        wb = op.load_workbook(self.__file_name__)
        wl = wb[list_sheetname]
        # FB理由をエクセルシートから取得し、配列に格納し、配列オブジェクトを返す
        while True:
            reason_str = wl.cell(row=fb_reason_count,column=12).value
            if reason_str == None:
                break
            else:
                reason_list.append(reason_str)
                fb_reason_count += 1
        return reason_list

    