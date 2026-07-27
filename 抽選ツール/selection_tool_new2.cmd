:: command file
:: Create  2026/7/26 takao.hattori

@echo off

set DIRECTORY=

for /f "usebackq" %%i in (cd) do set DIRECTORY=%%i

echo !DIRECTORY!

python selection_tool1.py 
