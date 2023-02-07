##### Azure Active Directory 組織に作成されているすべてのポリシーを表示する#####
##### Create Date    2021/9/9
##### Create Author  T.HATTORI
################################################################################

###コマンド実行時の結果ファイル出力先の定義
$date = Get-Date -Format "yyyyMMddHHmmss"
$result_file = "C:\work\20210909\csv\Get-AzureADPolicy.csv"
$char_set = "UTF8"

###スクリプトメッセージの定義
$msg1="OK"
$msg2="NG"
$msg3="ファイルの作成に成功しました"
$msg4="ファイルの作成に失敗しました"
$msg5="異常終了"
$msg6="ファイルのOPENに失敗しました"
$msg7="データ対象外です"
$msg8="CSVファイルが既に開いています"

##リターンコードの定義
$normal_code=0
$error_code=1

##行数の管理
$count = 0
$sum_count = 1

##コマンドメソッド
function command {
    try {
        Get-AzureADPolicy | Export-csv $result_file -Encoding $char_set
    } catch {
        Write-Host $msg8
        critical_error("False")
    }
    return_code($?)
}

##リターンコードメソッド
function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

##ファイル確認のメソッド
function check_file {
    $flag = Test-Path ($result_file)
    if ($flag -eq "True" ) {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        critical_error("False")
    }
}

##異常終了メソッド
function critical_error($ans2) { 
    if ($ans2 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}

function kaishi {
    Write-Host "----------START--------------"
}

function syuryo {
    Write-Host "----------END----------------"
}

kaishi
command
check_file
try{               
    $file = New-Object System.IO.StreamReader($result_file)
} catch {
    Write-Host $msg6
    critical_error("False")
}
while (($line = $file.ReadLine()) -ne $null)
 {
    if ($sum_count -eq 1) {
       Write-Host $msg7
    } elseif ($sum_count -eq 2) {
       Write-Host $msg7
    } else {
       $count += 1
    }
    $sum_count += 1
}
    
try {
        $file.Close()
} catch {
   while($true) {
      $file.Close()
      if ($? -eq "True") {
          break
      }
   }
}

Write-Host $count
syuryo

exit $normal_code
