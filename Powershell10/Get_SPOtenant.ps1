###### 　　SPOテナント情報一覧
######     Create Date   2021/8/24
######     Create Author  T.HATTORI
###出力先ファイルの定義
$result_file = "C:\work\20210824\result\Get_SPOTenant.txt"
###出力先ファイルの行数
$count = 0
###標準出力のメッセージ定義
$msg1 = "リターンコードは正常です"
$msg2 = "リターンコードは異常です"
$msg3 = "SPOテナント名ファイルの作成に成功しました"
$msg4 = "SPOテナント名ファイルの作成に失敗しました"
$msg5 = "ファイルのOpenに成功しました"
$msg6 = "ファイルのOpenに失敗しました"
$msg7 = "ファイルのCloseに成功しました"
$msg8 = "ファイルのCloseに失敗しました"
$msg9 = "異常終了です"
$msg10 = "正常終了です"

#### コマンド実行メソッド
function command {
    Get-SPOtenant | Format-List | Out-File $result_file
    return $?
}
####  リターンコードメソッド
function return_code($ans1) {
    if ($ans1 -eq "True"){
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
####  ファイルの存在確認チェックメソッド
function file_check {
    $flag = test-path $result_file
    if ($flag -eq "True"){
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $code = "False"
        critical_error($code)
    }
}
#### 異常終了メソッド
function critical_error($ans2){
    if ($ans2 -eq "True"){
        Write-Host $msg9
        exit 1
    }
}                
#### メイン処理
$return1 = command
return_code($return1)
file_check
#####ファイルを読み込む
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
Write-Host $msg5
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
Write-Host $msg7
Write-Host "ファイルの行は"$count"です。"
Write-Host $msg10
exit 0
