####################################################
####       原因別FB件数取得スクリプト          ######
####    新規作成  :  2024/4/11                ######
####    Create By  takao.hattori              ######
####################################################
# ライブラリ
import os 
import glob
import codecs
import openpyxl as op
import re
import datetime 
from make_fbfilelist import Make_FBfilelist
from get_project_name import Get_Project_Name


output_file = "filelist.txt"
fb_reason_count = 3
fb_data_count = 0
fb_array = []
fb_count = 0
fb_data_count = 0
start_fb_count = fb_data_count
end_fb_count = 0
project_name = ""
reason_count = 0
insident_count = 0
process_str = ""
result_file = ""
patturn_msg = "*.xlsx"


dt = datetime.datetime.now()
date1 = dt.strftime('%Y%m%d%H%M%S')


file_exist = os.path.isfile(output_file)
if file_exist:
    os.remove(output_file)

# FBシートファイル一覧リスト作成クラスを呼び出して、リストを作成する
make_listfile = Make_FBfilelist(output_file)
make_listfile.make_listfile(patturn_msg)

with open(output_file,encoding="utf-8",mode="r") as f:
    feedback_sheetname = 'FB'
    list_sheetname = 'List'
    while True:
        file_name = f.readline()
        file_name = file_name.replace('\n',"")
        if file_name == "":
           break
        # 案件名取得オブジェクトを呼び出し、案件名を取得する。
        proj = Get_Project_Name(file_name)
        project_name = proj.get_project_name()   
                
        wb = op.load_workbook(file_name)
        wl = wb[list_sheetname]
        wf = wb[feedback_sheetname]

        #エクセルファイルからFB要因リストを読み込み、配列に格納する 
        while True:
            if project_name == "I&D" or project_name == "JPiT myTE":
                reason_str = wl.cell(row=fb_reason_count,column=12).value
                fb_data_count = 10
            else:
                reason_str = wl.cell(row=fb_reason_count,column=11).value
                fb_data_count = 9
            start_fb_count = fb_data_count        
            if reason_str == None:
                break
            else:
                fb_array.append(reason_str)
                fb_reason_count += 1
        
        # FBデータを取得する
        while True:
            if project_name == "I&D" or project_name == "JPiT myTE":
                work_name = wf.cell(row=5,column=5).value
                process_str = wf.cell(row=4,column=5).value
            else:
                work_name = wf.cell(row=4,column=5).value
                 
            result_file =  project_name + "名前" + work_name + date1 + ".csv"  
            data_str = wf.cell(row=fb_data_count,column=11).value
            if data_str == None:
                end_fb_count = fb_data_count
                break
            else:
                fb_data_count += 1
        
        #　FB要因別のFB件数を取得 
        for reason in fb_array:
            for i in range(start_fb_count,end_fb_count+1):
                data_str = wf.cell(row=i,column=11).value
                if data_str == reason:
                    reason_count += 1
            if project_name == "I&D" or project_name == "JPiT myTE":
                msg = project_name + "," + process_str + "," + work_name + "," + reason + "," + str(reason_count)
            else:                
                msg = project_name + "," + work_name + "," + reason + "," + str(reason_count)
            print(msg,file=codecs.open(result_file,'a','shift-jis')) 
            reason_count = 0
        
        # インシデント件数を取得
        for i in range(start_fb_count,end_fb_count+1):
            reason = "インシデント"
            insident_str = wf.cell(row=i,column=12).value
            if insident_str == "〇":
                insident_count += 1
        if project_name == "I&D" or project_name == "JPiT myTE":
            msg = project_name + "," + process_str + "," + work_name + "," + reason + "," + str(insident_count)
        else:                
            msg = project_name + "," + work_name + "," + reason + "," + str(insident_count)
        print(msg,file=codecs.open(result_file,'a','shift-jis')) 
        insident_count = 0         

