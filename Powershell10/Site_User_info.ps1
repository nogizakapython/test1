#### Sharepoint Site別のサイトユーザー一覧
#### Create date    2021/8/24
#### Create Author  T.HATTORI
#日付の変数定義
$date = Get-date -Format "yyyyMMddHHmmss"
#出力ファイル
$result_file = "C:\work\20210824\result\Site_User$date.txt"
#メッセージ一変数の定義
$msg1= "コマンドが正常に実行されました"
$msg2= "コマンド実行に失敗しました"
$msg3= "コマンドの実行結果のファイル取得に成功しました"
$msg4 = "コマンド実行結果のファイル取得に失敗しました"
$msg5 = "異常終了です"
$msg6 = "ファイルのOPENに失敗しました"
$msg7 = "ファイルのOPENに成功しました"
$msg8 = "ファイルのCLOSEに失敗しました"
$msg9 = "ファイルのCLOSEに成功しました"

#SharepointのURLデータ配列
$URL = @('https://hattori19751014.sharepoint.com/sites/bbSystemComunity','https://hattori19751014.sharepoint.com/sites/Powershell',
         'https://hattori19751014.sharepoint.com/')

#### リターンコードメソッド
function return_code($ans1) {
    if ($ans1 -eq "True"){
        Write-Host $msg1 
    } else {
        Write-Host $msg2
    }           
}

#ファイルのチェック確認メソッド
function file_check {
    $flag = Test-Path $result_file
    if ($flag -eq "True"){
        Write-Host $msg3
    } else { 
        Write-Host $msg4
        $flag = "False"
        critical_check($flag)
    }
}

function critical_check($flag) {
     if ($flag -eq "False") {
        Write-Host $msg5
        exit 1
    }
}
### 配列の個数を表示するメソッド
function hairetsu_count {
    $num = $URL.count
    Write-Host $num
}

hairetsu_count

#配列の数だけ、サイトのユーザーをファイルに書き込む
foreach ($line in $URL ){
    Get-SPOUser -Site $line | Out-File $result_file -Append
    return_code($?)
}


file_check

#####ファイルを読み込む処理
try
{
    $file = New-Object System.IO.StreamReader($result_file)
} 
catch
{
    Write-Host $msg6
    $ans = "False"
    critical_check($ans)
}

Write-Host $msg7
while (($line = $file.ReadLine()) -ne $null)
{
    $count += 1
}

#####ファイルを閉じる時に例外処理でファイルが閉じることを確認する。
try 
{
    $file.Close()
}
catch
{
    Write-Host $msg8
    $ans = "False"
    critical_check($ans)
}
Write-Host $msg9
Write-Host "ファイルの行は"$count"です。"
exit 0
