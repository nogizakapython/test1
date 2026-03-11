from pypdf import PdfReader
path = 'ENEOS_kessan.pdf'
reader = PdfReader(path)
text = ""
for i in range(len(reader.pages)):
    page = reader.pages[i]
    text += page.extract_text()

print(text)