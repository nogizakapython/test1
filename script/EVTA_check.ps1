#############################################
#   EVTA  インストールチェック　スクリプト
#   Create  2023/6/19  T.Hattori
#   Modefy  2023/6/20  T.Hattori (メッセージを変数にする) 
############################################

#表示メッセージの定義
$MSG1 = "EVTAインストールチェックツール開始"
$MSG2 = "EVTAがインストールされていません！EVTAをインストールしてください!"
$MSG3 = "EVTAがインストールされています！"
$MSG4 = "EVTAインストールチェックツール終了"

#開始処理
Write-Host $MSG1

#インストールアプリにEVTAがインストールされているかチェックする
$EVTA_count = (Get-ItemProperty HKLM:\Software\Wow6432Node\Microsoft\Windows\CurrentVersion\Uninstall\* | Select-Object DisplayName, DisplayVersion | Select-String "Email Validation Tool for Accenture").Count 
if ($EVTA_count -eq 0){
    Write-Host $MSG2
} else {
    Write-Host $MSG3
}

#終了処理
Write-Host $MSG4