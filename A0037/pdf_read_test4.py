from pypdf import PdfReader
import os


path = 'ENEOS_kessan.pdf'
reader = PdfReader(path)
text = ""
out_file = './result1.csv'
for i in range(len(reader.pages)):
    page = reader.pages[i]
    text += page.extract_text()

os.remove(out_file)
with open(out_file,mode='a',encoding='utf-8') as f:
    print(text,file=f)