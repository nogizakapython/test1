#################################################
#################################################
####     再起動スクリプト                  ###########
####   Create    2023/6/15  Takao.Hattori  ######
#################################################

function reboot() {
    Restart-Computer -Force
    return $?
}

Write-Host  "windows reboot Script START"
$flag = reboot
if ($flag -eq $true){
    Write-Host "Success"
} else {
    Write-Host "Failed"
}
Write-Host "Windowsを再起動します"
