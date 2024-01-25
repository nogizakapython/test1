##############################
######  Morning call      ####
##############################

$hour1 = (Get-Date).Hour
$minute1 = (Get-Date).Minute
$music_file = "C:\20220106\powershell\test1.wav"

Function task1()  {
    $sp = New-Object Media.SoundPlayer $music_file
    $sp.Play()
    return "END"

}


if (($hour1 -eq 6) -and ($minute1 -eq 0))
{
    Write-Host "Please Get up!"
    #$sp = New-Object Media.SoundPlayer ./test1.wav
    #$sp.Play()
    #$sp.Stop()
}


$job1 = Start-Job -ScriptBlock task1
Wait-job $job1.Id

$res1 = Receive-Job $job1 -Wait 
