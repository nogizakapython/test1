######  MailBox Uset カウントスクリプト  ######
######  Create Author    2021/9/3        ######
######  Create Date      T.HATTORI       ######
$result_file = "C:\work\20210903\csv\Get_Mail_User.csv"
$char_set = "UTF8"

##メッセージの定義
$msg1 = "OK"
$msg2 = "NG"
$msg3 = "CSVファイルの作成に成功しました"
$msg4 = "CSVファイルの作成に失敗しました"
$msg5 = "異常終了"
$msg6 = "CSVファイルの読み込みに失敗しました"
$msg7 = "除外データです"
$sum_count = 1
$count = 0

##コマンド関数
function command {
     Get-EXOMailbox | Export-Csv $result_file -Encoding $char_set
     return_code($?)
}
## リターンコード関数
function return_code($ans) {
    if ($ans -eq "True") {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

##ファイル作成チェック関数
function check_file {
    $flag = Test-Path $result_file
    if ($flag -eq "True") {
        Write-Host $msg3
    } else {
        Write-Host $msg4
        $sw = "False"
        critical_error($sw)
    }
}

function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host $msg5
        exit $error_code
    }
}

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
    } elseif ($sum_count -eq 3) {
        Write-Host $msg3
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
Write-Host "ユーザーの人数は"$count"人です"
exit $normal_code
