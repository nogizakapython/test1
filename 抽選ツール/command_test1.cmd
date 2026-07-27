@echo off
for /f "usebackq" %%i in (`cd`) do set TODAY=%%i
echo %TODAY%