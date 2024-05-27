import openpyxl as op
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from time import sleep

file_name = "test1.xlsx"
sheet_name = "Sheet1"
wb = op.load_workbook(file_name)
ws = wb[sheet_name]
w_mailaddress = ""
w_password = ""
for i in range(3,5):
    w_mailaddress = ws.cell(row=i,column=2).value
    url1 = 'https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&hl=ja&ifkv=AaSxoQxxdYfbHer1yNjZ37sjAaYjxeQ4_iEk5dFFOeFCNB9-UL71dCXbQs0ygKudv8zHg7ntOmytLQ&service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-972611724%3A1716777351448967&ddm=0#__utma=29003808.1890689234.1716777349.1716777349.1716777349.1&__utmb=29003808.0.10.1716777349&__utmc=29003808&__utmx=-&__utmz=29003808.1716777349.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)&__utmv=-&__utmk=48196196'
    xpath1 = '/html/body/div[1]/div[1]/div[2]/c-wiz/div/div[2]/div/div/div[1]/form/span/section/div/div/div[1]/div/div[1]/div/div[1]/input'
    driver = webdriver.Chrome()
    driver.get(url1)
    sleep(5)
    text1 = driver.find_element(By.XPATH, xpath1)
    text1.send_keys(w_mailaddress) 
    xpath2 = '//*[@id="identifierId"]'
    element = driver.find_element(By.XPATH,xpath2)
    driver.execute_script("arguments[0].click();", element)
    sleep(3)
    


    


