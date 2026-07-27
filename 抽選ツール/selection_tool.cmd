:: command file
:: Create  2026/7/26 takao.hattori

@echo off
for /f "usebackq" %%i in (`cd`) do set DIRECTORY
cd %DIRECTORY%
python selection_tool1.py 
