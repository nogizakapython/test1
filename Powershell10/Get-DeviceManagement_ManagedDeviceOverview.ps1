########### Intune デバイス管理状況チェックスクリプト
########### Creata Date  2021/8/25
########### Create Author  T.HATTORI
####出力先ファイルの定義
$result_file = "C:\work\20210825\csv\result_SPO_site.csv"
#メッセージ変数の定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "デバイス管理状況チェックファイルの作成に成功しました"
$msg4 = "デバイス管理状況チェックファイルの作成に失敗しました"
$msg5 = "異常終了です"
$msg6 = "ファイルの読み込みに失敗しました"
$msg7 = "ファイルの読み込みに成功しました"
$msg8 = "ファイルのCLOSEに失敗しました"
$msg9 = "ファイルのCLOSEに成功しました"
#ファイルの行数カウントを定義する
$count = 0
#リターンコード
$normal_end=0
$error_end=1

### コマンド実行メソッド
function command {
    Get-DeviceManagement_ManagedDeviceOverview | Format-List | Out-File $result_file
    return_code($?)
}

### リターンコード確認メソッド
function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

###  ファイル作成確認メソッド
function check_file {
    $flag2 = Test-Path $result_file
    if ($flag2 -eq "True"){
        Write-Host $msg3      
    } else {
        Write-Host $msg4
        $flag = "False"
        critical_error($flag)
    }
}

### クリティカルエラーメソッド
function critical_error($ans2) {
    if ($ans2 -eq "False"){
        Write-Host $msg5
        exit $error_code
    }
}

### ファイルの読み込みメソッド
function file_read {
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
}

#メイン処理
command
check_file
file_read

exit $normal_end
