import openpyxl

file_path = "Flash_20241101.xlsx"
target_file = "new_" + file_path

wb = openpyxl.load_workbook(file_path)
sheet_array = file_path.split('.')
sheet_name = sheet_array[0]
ws = wb[sheet_name]

for row in ws.iter.rows(values_only=True):
    print(row)