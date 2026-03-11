from pdfminer3.pdfinterp import PDFResourceManager, PDFPageInterpreter
from pdfminer3.converter import PDFPageAggregator
from pdfminer3.pdfpage import PDFPage
from pdfminer3.layout import LAParams, LTTextContainer



resourceManager = PDFResourceManager()
device = PDFPageAggregator(resourceManager, laparams=LAParams())

pdf_file_name = './ENEOS_kessan.pdf'
with open(pdf_file_name, 'rb') as fp:
    interpreter = PDFPageInterpreter(resourceManager, device)
    for page in PDFPage.get_pages(fp):
        interpreter.process_page(page)
        layout = device.get_result()
        for lt in layout:
            # LTTextContainerの場合だけ標準出力
            if isinstance(lt, LTTextContainer):
                print(lt.get_text())
device.close()