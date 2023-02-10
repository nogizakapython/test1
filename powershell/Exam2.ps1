class Exam2 {
    [int]  $num = 100
    [string] $str = "test1"

    [int] Div([int] $msg){
        $this.num = $this.num / $msg 
        return $this.num
    }
    [string] Div([string] $msg){
        $count = $msg.Length
        $count /= 2
        $this.str += $msg.substring(0,2)
        return $this.str
    }

}

#インスタンス化
$Exam = New-Object Exam2

#数値計算
$Exam.Div(2)
$Exam.Div(5)

#文字列操作
$Exam.Div("Apple")
$Exam.Div("BASIC")



