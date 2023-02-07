####### Process Admin Script  #####
####### Create Date  2021/8/26
####### Create Author T.HATTORI
####Process監視用アプリケーションの管理
$Pro1="Teams"
$Pro2="docker"
####プロセス監視用出力ファイル
$pro_file1="C:\work\20210826\result\Teams_process.txt"
$pro_file2="C:\work\20210826\result\Docker_process.txt"
####メッセージの定義
$msg1 = "OK"
$msg2 = "OK"
$msg3 = "Teamsのプロセス監視ファイルの取得に成功しました"
$msg4 = "Teamsのプロセス監視ファイルの取得に失敗しました"
$msg5 = "Dockerのプロセス監視ファイルの取得に成功しました"
$msg6 = "Dockerのプロセス監視ファイルの取得に失敗しました"
$msg7 = "異常終了です"
$msg8 = "例外処理発生!Teamsのプロセス監視ファイルのOPENに失敗しました"
$msg9 = "Teamsのプロセス監視ファイルのOPENに成功しました"
$msg10 = "例外処理発生!Teamsのプロセス監視ファイルのCLOSEに失敗しました"
$msg11 = "Teamsのプロセス監視ファイルのCLOSEに成功しました"
$msg12 = "例外処理発生!Dockerのプロセス監視ファイルのOPENに失敗しました"
$msg13 = "Dockerのプロセス監視ファイルのOPENに成功しました"
$msg14 = "例外処理発生!Dockerのプロセス監視ファイルのCLOSEに失敗しました"
$msg15 = "Dockerのプロセス監視ファイルのCLOSEに成功しました"


###プロセス数の個数カウント
$count=0

### リターンコードの定義
$normal_code=0
$error_code =1

### Teamsアプリケーションプロセス監視
function Process1 {
    Get-Process | Select-String $Pro1 | Out-File $pro_file1
    return_code $? 
}

### Dockerアプリケーションプロセス監視メソッド
function Process2 {
    Get-Process | Select-String $Pro2 | Out-File $pro_file2
    return_code $? 
}

### リターンコードのメソッド
function return_code($ans1) {
    if ($ans1 -eq "True" ) {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}
##### Teamsプロセスファイルの存在確認メソッド
function check_teams_file {
    $flag = Test-Path $pro_file1
    if ($flag -eq "True"){
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $ans = "False"
        critical_error($ans)
    }
}
#### dockerプロセス出力ファイルチェックメソッド
function check_docker_file {
    $flag = Test-Path $pro_file2
    if ($flag -eq "True"){
        Write-Host $msg5
    } else {
        Write-Host $msg6
        $ans = "False"
        critical_error($ans)
    }
}

function critical_error($ans3){
    if ($ans3 -eq "False"){
        Write-Host $msg7
        exit $error_code
    }
}
### ファイルの読み込みメソッド(Teams)
function file_teams_read {
    $count = 0
    try
    {
        $file = New-Object System.IO.StreamReader($pro_file1)
    } 
    catch
    {
        Write-Host $msg8
        $ans = "False"
        critical_error($ans)
    }

    Write-Host $msg9
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
        Write-Host $msg10
        $ans = "False"
        critical_error($ans)
    }
    Write-Host $msg11
    Write-Host "ファイルの行は"$count"です。"
} 

### ファイルの読み込み(docker)メソッド
function file_docker_read {
    $count = 0
    try
    {
        $file = New-Object System.IO.StreamReader($pro_file1)
    } 
    catch
    {
        Write-Host $msg12
        $ans = "False"
        critical_error($ans)
    }

    Write-Host $msg13
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
        Write-Host $msg14
        $ans = "False"
        critical_error($ans)
    }
    Write-Host $msg15
    Write-Host "ファイルの行は"$count"です。"
}

#### メイン処理
Process1
Process2
check_teams_file
check_docker_file
file_teams_read
file_docker_read
exit $normal_code
