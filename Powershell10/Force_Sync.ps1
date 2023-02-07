##### Sync Azure Force Sync  script ######
##### Create Date     2021/9/7      ######
##### Create Author   T.HATTORI     ######

$result_file="C:\work\20210907\result\force_Sync.txt"
$sw = 0

$normal_code = 0
$error_code = 1

function command1($ans) {
    if ($ans -eq 1) {
        Start-ADSyncSyncCycle -PolicyType Delta | Out-File -Append $result_file
        return_code($?)
    } elseif($ans -eq 2) {
        Start-ADSyncSyncCycle -PolicyType Initial | Out-File -Append $result_file
        return_code($?)
    } else {
        Write-Host "Please input 1 or 2"
    }
}

function command2 {
    Get-ADSyncScheduler | Out-File $result_file -Append
    return_code($?)
}

function return_code($ans1) {
    if ($ans1 -eq "True") {
        Write-Host "OK"
    } else { 
        Write-Host "NG"
    }
}

function check_file {
    $flag = Test-Path $result_file
    if ($flag -eq "True") {
        Write-Host "Get output file"
    } else {
        Write-Host "Not Get output file"
        critical_error("False")
    }
}

function critical_error($ans2) {
    if ($ans2 -eq "False") {
        Write-Host "Critical Error"
        exit $error_code
    }
}

Write-Host "---------START------------"
while($true){
    $r1 = Read-Host "input number 1 or 2"
    if ($r1 -eq 1) {
        command1($r1)
        break
    } elseif($r1 -eq 2) {
        command1($r1)
        break
    }
}

command2
check_file

Write-Host "---------END--------------"

exit $normal_end     
             