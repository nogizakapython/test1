Get-Date
$music_file = "C:\20220106\powershell\test1.wav"
$job1 = {
          for($i=0;$i -lt 2;$i++){
            sleep 10;
            "[+] Finished (1)"
          }
       
}


$sp = New-Object Media.SoundPlayer $music_file

Start-Job $job1


$sp.Play()
sleep 20
$sp.Stop()



Get-Date

