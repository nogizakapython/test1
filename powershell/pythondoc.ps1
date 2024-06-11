$DirPath = "c:\users\takao.hattori\onedrive - accenture\python_asobi"
$result_file = $DirPath + "\" + "result.txt"
$array1 = @("sample_dsi","sample_jpit")
foreach($str in $array1){
    Write-Host $str
}