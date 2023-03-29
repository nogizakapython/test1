############################################
#   echo、Write-Host、Write-Outputの違い    ###
#  新規作成  2023/3/29                    ###
############################################

$FILE_NAME = "c:\20230201\result1.txt"

Write-Host "***** echo コマンドの出力結果" >> $FILE_NAME
echo $PSVersionTable | Out-File $FILE_NAME

Write-Host "***** Write-Host コマンドの出力結果" >> $FILE_NAME
Write-Host $PSVersionTable >>  $FILE_NAME


Write-Host "***** Write-Out コマンドにパイプでFormat-Listの出力結果" >> Out-File $FILE_NAME
Write-Output $PSVersionTable | Format-List | Out-File $FILE_NAME



