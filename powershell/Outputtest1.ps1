############################################
#   echo、Write-Host、Write-Outputの違い    ###
#  新規作成  2023/3/29                    ###
############################################


Write-Host "***** echo コマンドの出力結果"
echo $PSVersionTable

Write-Host "***** Write-Host コマンドの出力結果"
Write-Host $PSVersionTable


Write-Host "***** Write-Out コマンドにパイプでFormat-Listの出力結果"
Write-Output $PSVersionTable | Format-List



