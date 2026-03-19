#######   ICEnergy 石油平均価格推移情報のうち、毎月の石油平均価格を取得する処理　###########
#######   新規作成  2026/01/14  ##########
#######   Author  takao.hattori ###########


# WebDriverライブラリをインポート
from selenium import webdriver
from selenium.webdriver.common.by import By
# opempyxlライブラリをインポート
import openpyxl as op
# 待機時間ライブラリをインポート
from time import sleep
# 共通クラスをインポートする
import oil_common_data 


# 取得先のURLの変数
target_url = 'https://pps-net.org/statistics/crude-oil'



# 取得結果格納配列
data_array = []

# 種別配列
genre_array = ["ドバイ 12 22","ブレント 13 23","WTI 14 24","OPECバスケット 15 25"]



# 価格データのデータクレンジング処理
def data_clansing(work_data_accout):
    work_data_accout = work_data_accout.replace(' $/バレル',"")
    work_data_accout = work_data_accout.replace('<td>',"")
    work_data_accout = work_data_accout.replace('</td>',"")
    # 不要な文字を取り除いたデータを返す
    return work_data_accout


# メイン関数
def main():
    # 出力開始行の変数
    start_row_num = 2
    # 出力先の列数変数
    col_num = 2
    # 出力先の列数変数
    row_num = start_row_num
    # Chromeを指定する
    driver = webdriver.Chrome()
    # インスタンスを呼び出す
    output_e = oil_common_data.Common_data()
    try:
        driver.get(target_url)
        sleep(1)

        try:
           
            for data in genre_array:
                w_array2 = data.split(" ")
                start_num = int(w_array2[1])
                end_num = int(w_array2[2])
                for i in range(start_num,end_num,5):
                    for j in range(1,13):
                        xpath_str = '/html/body/div[4]/div/main/div/div/div/table[2]/tbody/tr[' + str(i) + ']/td[' + str(j) + ']'
                        element_str = driver.find_element(by=By.XPATH,value=xpath_str)
                        w_accout_data = element_str.get_attribute("outerHTML")
                        data_array.append(w_accout_data)
                array_length = len(data_array)
                for k in range(0,array_length):
                    data_accout = data_array[k]
                    data_accout = data_clansing(data_accout)
                    output_e.output_data(data_accout,row_num,col_num)
                    col_num += 1        
                
                row_num += 1
                col_num = 2
                data_array.clear()
        except:
            exit(1)
        
    except EnvironmentError as e:
        print("作業対象月の原油価格を取得できませんでした")
        exit(1)  
    
    

if __name__ == "__main__":
    main()
    