#######   全国信用金協会会員リスト作成　###########
#######   新規作成  2024/05/20  ##########
#######   Author  takao.hattori ###########

# 前回作業用ファイルの削除
def delete_out_file(file_name):
    import os
    os.remove(file_name)

# テンプレートからエクセルファイルをコピーする関数
def copyexcelfile():
    import shutil
    import sys
    import datetime
    dt = datetime.datetime.now()
    date3 = dt.strftime('%Y%m%d')
    base_file = "全国信用金協会会員テンプレート.xlsx"
    export_file = "全国信用金協会会員" + date3 + ".xlsx"
    try:
        shutil.copy(base_file,export_file)
    except:
        print(f"{export_file}を閉じてください。")
        sys.exit() 
    return export_file

# タグのデータクレンジング処理関数
def data_cleansing(str1):
    import re
    result1 = re.search('a href',str1)
    w_bankname = ""
    if result1:
        w_array1 = str1.split('>')
        w_bankname = w_array1[2]
        w_bankname = w_bankname.replace('</a','')
        w_bankname = w_bankname.replace('<br','')
        w_bankname += "信金"
    return w_bankname


# エクセルファイルに信用金庫名を出力する関数
def outputfile(result_file,bank_name,max_row):
    import openpyxl as op
    wb = op.load_workbook(result_file)
    sh_name = '銀行'
    ws = wb[sh_name]
    ws.cell(row=max_row,column=3).value = bank_name
    # エクセルファイルの保存
    wb.save(result_file)
    
# メイン関数
def main():
    # 時間を計るライブラリをインポート
    import os
    import re
    # WebDriverライブラリをインポート
    from selenium import webdriver
    from selenium.webdriver.common.by import By
    # テキストファイル書き込みライブラリのインポート
    import codecs
    # 待機時間ライブラリのインポート
    from time import sleep
    # 出力先テキストファイル変数 
    out_file = "zenshinkin.txt"
    # スクレイピング対象URL
    target_url1 = 'https://www.shinkin.co.jp/tikubetu/hokkaido.htm'
    target_url2 = 'https://www.shinkin.co.jp/tikubetu/tohoku.htm'
    target_url3 = 'https://www.shinkin.co.jp/tikubetu/kantou.htm'
    target_url4 = 'https://www.shinkin.co.jp/tikubetu/kosinetu.htm'
    target_url5 = 'https://www.shinkin.co.jp/tikubetu/hokuriku.htm'
    target_url6 = 'https://www.shinkin.co.jp/tikubetu/tokai.htm'
    target_url7 = 'https://www.shinkin.co.jp/tikubetu/kinki.htm'
    target_url8 = 'https://www.shinkin.co.jp/tikubetu/cyugoku.htm'
    target_url9 = 'https://www.shinkin.co.jp/tikubetu/sikoku.htm'
    target_url10 = 'https://www.shinkin.co.jp/tikubetu/kyusyu.htm'
    # スクレイピング配列の定義
    target_array = [target_url1,target_url2,target_url3,target_url4,target_url5,target_url6,target_url7,target_url8,target_url9,target_url10]

    max_row = 5
    
    row_count = 0
    
    # Chromeを指定する

    driver = webdriver.Chrome()


    file_check = os.path.isfile(out_file)
    if file_check:
        delete_out_file(out_file)

    for target_url in target_array:
        # Chromeを開いて企業HPにアクセスする
        try:
            driver.get(target_url)
            sleep(5)
    

            for i in range(1,11):
                for j in range(2,61):
        
        
                    try:
                        xpath_str1 = '/html/body/div[2]/table[' + str(i) + ']/tbody/tr[' + str(j) + ']'
                        element_str1 = driver.find_element(by=By.XPATH,value=xpath_str1)
                        print(element_str1.get_attribute("outerHTML"),file=codecs.open(out_file,'a','utf-8'))
            
                    except:
            
                        break
        

        except EnvironmentError as e:
            str100 = e     
        except:
            str1000 = ""

    # 画面を閉じる
    driver.quit()

    export_file = copyexcelfile()

    fileobj = open(out_file,encoding="utf-8")
    while True:
        line1 = fileobj.readline()
        line1 = line1.replace("\n","")
        if line1:
            row_count += 1
        else:
            break   
        
        
        result1 = re.search('a href',line1)
        if result1:
            w_bankname = data_cleansing(line1) 
            outputfile(export_file,w_bankname,max_row)    
                    
            max_row += 1
    
if __name__ == "__main__":
    main()