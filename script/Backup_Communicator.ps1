#################################################
#    TransCommunicator    backup and mentenance##
#    Create     2023/7/20                      ##
#    Modefy     2023/7/21(Backup and mente)    ##
#    Author     Takao.Hattori                  ##
#################################################

#TransCommunicator Directory
$C_DIR = "C:\Users\takao.hattori\TransComunicator"
#TransCommunicator Backup Directory
$T_DIR = 'C:\Users\takao.hattori\OneDrive - Accenture\TransComunicator'
#Script Directory
$S_DIR = 'C:\Users\takao.hattori\OneDrive - Accenture\script'

#Error関数(カレントディレクトリ失敗処理)
function error1(){
    echo "Curent Directory Error"    
}

#Error関数(バックアップ処理失敗処理)
function error2(){
    echo "Failure Copy File"    
}

Write-Host "START Procedure"

cd $C_DIR
if ($? -eq "True"){
    echo "OK Target File path"
} else {
    error1
}

Copy-Item * $T_DIR
if ($? -eq "True") {
    echo "OK Backup Trans File"
} else {
    error2
}


#バックアップ保持日数変数の定義
$DAYS = 1
Get-ChildItem $C_DIR -Recurse | Where-Object {($_.Mode -eq "-a----") -and ($_.LastWriteTime -lt (Get-Date).AddDays(-1 * $DAYS))} | Remove-Item -Recurse -force
if ($? -eq $true) {
    Write-Host "OK Delete"
} else {
    Write-Host "NG not Delete"
}

cd $S_DIR
if ($? -eq "True"){
    echo "OK change Script path"
} else {
    error1
    
}

Write-Host "End Procedure"  
     