
import win32com.client

# Outlookアプリケーションを起動
outlook = win32com.client.Dispatch("Outlook.Application")

# 新しいメールアイテムを作成
mail = outlook.CreateItem(0)

# 宛先、件名、本文を設定
mail.To = "takao.hattori@accenture.com"
mail.Subject = "test"
mail.Body = "テスト"

# セキュリティラベルを設定（Microsoft PurviewのラベルIDを指定）
# ラベルIDは Purview 管理センターで確認可能
label_id = "your_label_id_for_highly_confidential_internal_use_only"

# セキュリティラベルのプロパティを設定
mail.PropertyAccessor.SetProperty(
    "http://schemas.microsoft.com/mapi/proptag/0x10F4000B", True
)
mail.PropertyAccessor.SetProperty(
    "http://schemas.microsoft.com/mapi/string/{00020329-0000-0000-C000-000000000046}/Microsoft.Outlook.SensitivityLabel",
    label_id
)

# メールを表示（送信はせず、編集可能な状態で表示）
mail.Display()
