###### Powershell Azure Active Directory サービスプリンシパル一覧
###### Create  Date   2021/8/30
###### Create  Author  T.HATTORI

$date = Get-date -Format "yyyyMMddhhmmss"
$result_file = "C:\work\20210830\log\Service_Principal$date.txt"
$msg1= "OK"
$msg2 = "NG"
$msg3 = "サービスプリンシパルの出力結果ファイルの取得に成功しました"
$msg4 = "サービスプリンシパルの出力結果ファイルの取得に失敗しました"
$msg5 = "正常終了です"
$msg6 = "異常終了です"


function command {
    Get-AzureADServicePrincipal | Format-List | Out-File $result_file
    return_code($?)
}

function return_code($ans) {
    if ($ans -eq "True" ) {
        Write-Host $msg1
    } else {
        Write-Host $msg2
    }
}

function file_check {
    $flag = test-path $result_file 
    if ($flag -eq "True") {
        Write-Host $msg3
        $ans2 = "True"
        syori($ans2)
    } else {
        Write-Host $msg4
        $ans2 = "False"
        syori($ans2)
    }
}
function syori($ans2) {
    if ( $ans2 -eq "True"){
        Write-Host $msg5
        exit $normal_code
    } else {
        Write-Host $msg6
    }
}

command
file_check
