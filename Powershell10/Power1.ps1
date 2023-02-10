class Exam1 {
    [int]  $num = 1
    [string] $str = ""

    [int] Power([int] $msg){
        $this.num *= $msg 
        return $this.num
    }
    [string] Power([string] $msg){
        for($i=0;$i -lt 2;$i++){
            $this.str += $msg
        }
        return $this.str
    }

}

#インスタンス化
$Exam = New-Object Exam1

#数値計算
$Exam.Power(2)
$Exam.Power(3)

#文字列操作
$Exam.Power("Powershell")
$Exam.Power("Microsoft")



