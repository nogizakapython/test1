@echo off
chcp 65001 > nul
echo ============================================
echo  Library Installation Script
echo ============================================
echo.
echo [1/2] Installing required libraries...
.venv\Scripts\pip install playwright openpyxl flask
echo.
echo [2/2] Installing Chromium browser for Playwright...
.venv\Scripts\python -m playwright install chromium
echo.
echo ============================================
echo  Installation complete!
echo  Run: python 00_setup_check.py
echo ============================================
pause
