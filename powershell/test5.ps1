$msg = ""
$num = 3
function ans_str {
    for($i=0;$i -lt $num;$i++){
        $random = Get-Random -Minimum 1 -Maximum 4
        if ($random -eq 1){
            $msg = $msg + "A"
        } elseif ($random -eq 2) {
            $msg = $msg + "B"
        } elseif ($random -eq 3) {
            $msg = $msg + "C"
        }
        if($i -eq 2){
            return $msg
            break
        }
    }
}

$ans_str = ans_str
echo $ans_str

