####################################################
####    原因別FB件数取得スクリプト             ######
####    新規作成  :  2024/4/11                ######
####    Create By  takao.hattori              ######
####################################################

def main():
    # ライブラリのインポート
    import os 
    import openpyxl as op
    import datetime 
    import warnings
    import sys
    
    
    # クラスのインポート
    from make_fbfilelist import Make_FBfilelist
    from get_project_name import Get_Project_Name
    from get_begin_fb_row import Get_Begin_fb_row
    from fb_not_reason import FB_not_process_Reason
    from fb_myte_reason import FB_myte_process_Reason
    from fb_id_reason import FB_id_process_Reason
    from get_fb_data import Get_fb_Data
    from get_worker import Get_worker
    from get_worker_and_process import Get_worker_and_process
    from get_reason_file_output import Get_Reason_file_output
    from get_incident_file_output import Get_Incident_file_output

    # メイン関数の変数定義
    output_file = "filelist.txt"
    fb_data_count = 0
    start_fb_count = fb_data_count
    end_fb_count = 0
    project_name = ""
    process_name = ""
    result_file = ""
    patturn_msg1 = "*.xlsx"
    patturn_msg2 = "*.xlsm"
    patturn_list = [patturn_msg1,patturn_msg2]
    # 日付変数
    dt = datetime.datetime.now()
    date1 = dt.strftime('%Y%m%d%H%M%S')

    warnings.simplefilter('ignore')

    # 前回のファイル一覧リストがあれば削除する
    file_exist = os.path.isfile(output_file)
    if file_exist:
        os.remove(output_file)

    # FBシートファイル一覧リスト作成クラスを呼び出して、リストを作成する
    make_listfile = Make_FBfilelist(output_file)
    for str in patturn_list:
        make_listfile.make_listfile(str)
    # FBファイル確認処理
    file_check = os.path.isfile(output_file)
    if file_check == False:
        print("feedbackフォルダにレビューシートを格納してください")
        sys.exit()
        


    # FBシートファイル一覧リストを読み込んで、作業者別、案件単位でFB件数を集計する。
    with open(output_file,encoding="utf-8",mode="r") as f:
          
        while True:
            file_name = f.readline()
            file_name = file_name.replace('\n',"")
            if file_name == "":
                break
            # 案件名取得オブジェクトを呼び出し、案件名を取得する。
            proj = Get_Project_Name(file_name)
            project_name = proj.get_project_name()   
        
            # FBシートからFB指摘開始行を取得するオブジェクトのインスタンス変数
            begin_row = Get_Begin_fb_row()
            # 工程がない案件のFB指摘理由配列取得オブジェクトのインスタンス
            fb_not_reason_list = FB_not_process_Reason(file_name)
            # JPitT myTE案件のFB指摘理由配列取得オブジェクトのインスタンス
            fb_myte_reason_list = FB_myte_process_Reason(file_name)
            # I&D 案件のFB指摘理由配列取得オブジェクトのインスタンス
            fb_id_reason_list = FB_id_process_Reason(file_name)
            #FB指摘理由配列とFBシートの開始行を取得する。 
            if  project_name == "JPiT myTE":
                fb_array = fb_myte_reason_list.make_reason_list()
                fb_data_count = begin_row.get_begin_process_row_count()
            elif project_name == "I&D":
                fb_array = fb_id_reason_list.make_reason_list()
                fb_data_count = begin_row.get_begin_process_row_count() 
            else:
                fb_array = fb_not_reason_list.make_reason_list()
                fb_data_count = begin_row.get_begin_not_process_row_count()
            start_fb_count = fb_data_count        
        
            # 工程がない案件の作業者取得オブジェクトのインスタンス
            get_not_process_worker = Get_worker(file_name)
            # 工程がある案件の作業者取得オブジェクトのインスタンス
            get_process_worker = Get_worker_and_process(file_name)

            # 作業者と工程名を取得する。
            if project_name == "I&D" or project_name == "JPiT myTE":
                worker_and_process_array = get_process_worker.get_worker()
                work_name = worker_and_process_array[0]
                process_name = worker_and_process_array[1]
            else:
                work_name = get_not_process_worker.get_worker()

            # 出力用CSVファイル名を取得する  
            result_file =  project_name + " " + work_name + date1 + ".csv" 
             
        
            # FB指摘事項の最終行の行番号を取得する。
            get_final_row = Get_fb_Data(fb_data_count,file_name)
            end_fb_count = get_final_row.get_end_row_count()
        
            #　FB要因別のFB件数を取得 
            reason_output = Get_Reason_file_output(start_fb_count,end_fb_count,project_name,work_name,file_name,result_file)
            reason_output.get_reason_file_output(fb_array,process_name)
            # インシデント件数を取得
            incident_output = Get_Incident_file_output(start_fb_count,end_fb_count,project_name,work_name,file_name,result_file)
            incident_output.get_incident_file_output(process_name)    


if __name__ == "__main__":
    main()