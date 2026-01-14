
import win32com.client

# Outlookアプリケーションを起動
outlook = win32com.client.Dispatch("Outlook.Application")

# 新しいメールアイテムを作成
mail = outlook.CreateItem(0)

# 宛先、件名、本文を設定
mail.To = "takao.hattori@accentyre.com"
mail.Subject = "test"
mail.Body = "テスト"

# メールを表示（送信はせず、編集可能な状態で表示）
mail.Display()
