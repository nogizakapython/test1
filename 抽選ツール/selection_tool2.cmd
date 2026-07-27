:: command file
:: Create  2026/7/27 takao.hattori

@echo off
for /f "usebackq" %%i in (`cd`) do set DIRECTORY=%%i
cd %DIRECTORY%
python selection_tool1.py 
