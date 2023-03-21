class Hinatazaka{
    [int] $id
    [String] $name 
    Hinatazaka([int] $id,[String] $name) {
        $this.id = $id 
        $this.name = $name    
    }

    [void] Disp() {
         Write-Host( $this.name + "のid番号は" + $this.id + "です")  
    }
}

#インスタンス化
$rei1 = New-Object Hinatazaka(1,"佐々木久美")
$rei1.Disp()

$rei2 = New-Object Hinatazaka(2,"加藤史帆")
$rei2.Disp()

$rei3 = New-Object Hinatazaka(3,"影山優佳")
$rei3.Disp()

