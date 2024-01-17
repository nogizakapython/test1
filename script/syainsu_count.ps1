#################################################
#    社員数取得スクリプト                            ##
#    Create     2023/8/8                      ##
#    Author     Takao.Hattori                  ##
#################################################

$TARGET = "C:\Users\takao.hattori\OneDrive - Accenture\count.txt"
$SCRIPT_DIR = "C:\Users\takao.hattori\OneDrive - Accenture\script"
$array1 = Get-Content $TARGET
$count = 0
ForEach ($item in $array1) {
    # Write-Host("これは" + $item + "です")
    $count += 1
    
}
Write-Host $count"人です"
cd $SCRIPT_DIR

