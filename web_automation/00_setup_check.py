# -*- coding: utf-8 -*-
"""
00_setup_check.py  ─  環境確認スクリプト
──────────────────────────────────────────
実行方法:  python 00_setup_check.py

このスクリプトは本ハンズオンで使用するライブラリが正しくインストールされているか確認します。
全項目が「OK」になれば準備完了です。
"""

import sys

def check(label, import_stmt):
    try:
        exec(import_stmt)
        print(f"  ✅ {label}")
        return True
    except ImportError as e:
        print(f"  ❌ {label}  →  {e}")
        return False

print("=" * 50)
print("  環境確認スクリプト")
print("=" * 50)
print(f"Python バージョン: {sys.version}")
print()
print("【必須ライブラリ】")
results = [
    check("playwright",  "from playwright.async_api import async_playwright"),
    check("openpyxl",    "import openpyxl"),
    check("flask",       "import flask"),
]
print()
if all(results):
    print("✅ 全ての依存ライブラリが揃っています！")
    print("   次に Chromium ブラウザのインストールを確認します...")
    import subprocess, sys
    ret = subprocess.run([sys.executable, "-m", "playwright", "install", "chromium"],
                        capture_output=True, text=True)
    if ret.returncode == 0:
        print("✅ Chromium ブラウザの準備完了！")
    else:
        print("⚠️  playwright install chromium を手動で実行してください。")
        print(ret.stderr[:300])
else:
    print("❌ 不足しているライブラリがあります。")
    print("   install.bat（Windows）を実行するか、以下のコマンドを実行してください：")
    print("   pip install playwright openpyxl flask")
    print("   python -m playwright install chromium")

print()
input("Enterキーを押すと終了します...")
