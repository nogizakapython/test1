'メンバーチェック用のオブジェクト
'新規作成 2025/9/10 takao.hattori
'クラスの使い方
' 1.インスタンス変数(オブジェクト変数)で以下を宣言してください。
'    Dim [変数名] As Class1
'    例 clsというインスタンス変数をClass1に定義する場合
'    Dim cls As Class1

'メソッドの呼び方
'インスタンス変数にmember_checkメソッドを、引数に「New」、「TRG」、「SV」の3つのどれかを設定する。
'引数の説明
' New ⇒　入社一か月目の評価シート
' TRG ⇒　入社二月目の評価シート
' SV  ⇒　新人SV用
'使用例　入社一か月目の評価シートの人数チェック処理を呼び出す場合
' cls.member_check("New")


Function member_check(status As String) As Long
    'ワークブック変数の定義
    Dim wb1 As Workbook
    'ワークシート変数の定義
    Dim ws1 As Worksheet
    'メンバーの人数変数の定義
    Dim member_count As Long
        
    'wb1変数、ws1変数をセット
    Set wb1 = ThisWorkbook
    Set ws1 = wb1.Worksheets("入力フォーム")
    
    '引数が「New」の場合、新入社員TRGに参加する人数をチェックする。
    '引数が「TRG」の場合、入社二か月目のTRGに参加する人数をチェックする。
    '引数が「SV」の場合、業務TRGに参加する新人SVの人数をチェックする。
    If status = "New" Then
        member_count = ws1.Cells(4, 2)
    ElseIf status = "TRG" Then
        member_count = ws1.Cells(8, 2)
    ElseIf status = "SV" Then
        member_count = ws1.Cells(12, 2)
    End If
    
        
    '負の数だったら、メンバー人数変数に-1をセットする
    If member_count < 0 Then
        member_count = -1
    End If
    
        
    '人数またはリターンコードを返す
    member_check = member_count
    
End Function
