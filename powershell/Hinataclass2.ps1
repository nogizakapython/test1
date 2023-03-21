class Hinatazaka{
    [int] $id
    [String] $name
    [int] $like

    Hinatazaka([int] $id,[String] $name,[int] $like) {
        $this.id = $id 
        $this.name = $name 
        $this.like = $like  
    }

    Hinatazaka([int] $id,[String] $name) {
        $this.id = $id 
        $this.name = $name 
        $this.like = 0  
    }

    Disp() {
         Write-Host( $this.name + "のid番号は" + $this.id + "です")  
    }
    DispLike() {
         Write-Host( $this.name + "のいいねの数は" + $this.like + "です")  
    }

    Add([int] $data){
        $this.like += $data
        
    }
    
}

#インスタンス化
$rei1 = New-Object Hinatazaka(1,"佐々木久美",0)
$rei1.Disp()
$rei1.Add(1)
$rei1.DispLike()

$rei2 = New-Object Hinatazaka(2,"加藤史帆")
$rei2.Disp()
for($i=0;$i -lt 3;$i++){
    $rei2.Add(2)
}
$rei2.DispLike()


$rei3 = New-Object Hinatazaka(3,"影山優佳",0)
$rei3.Disp()
$rei3.DispLike()
