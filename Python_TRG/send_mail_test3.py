
import win32com.client

# Outlookアプリケーションを起動
outlook = win32com.client.Dispatch("Outlook.Application")

# 新しいメールアイテムを作成
mail = outlook.CreateItem(0)

# 宛先、件名、本文を設定
mail.To = "takao.hattori@accenture.com"
mail.Subject = "test"
mail.Body = "テスト"

# メールを送信
mail.Send()

print("メールを送信しました。")
