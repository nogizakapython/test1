# Powershell class Test2
# 新規作成 2023/3/8

class TestClass1{
    [int] $ID
    [String] $Name
    [String] $Dept
    
    #コンストラクタ
    Disp([int] $ID,[String] $Name,[String] $Dept) {
        $this.Id = $Id
        $this.Name = $Name
        $this.Dept = $Dept
    }
    #ToStringメソッド
    [String] ToString() {
        return "Id=" + $this.Id + ",Name=" + $this.Name
    }
    #Todeptメソッド
    [String] Todept() {
        return $this.Name + "は" + $this.Dept + "です。"
    }
    #Tocallメソッド
    [String] Tocall() {
        return $this.Dept
    }
    #Tonameメソッド
    [String] Toname() {
        return $this.name
    }


}

# TestClass1を継承して、testClass2を作成する。
class TestClass2 : TestClass1{
    [String] Like(){
        $Data = ([Testclass1]$this).Toname()
        $Data += "は面白い"
        return $Data
    }
}

# TestClass1を継承して、testClass2を作成する。
class TestClass3 : TestClass1{
    [String] Dislike(){
        $Data = ([Testclass1]$this).Toname()
        $Data += "は面白くない"
        return $Data
    }
}


$T1 = New-Object TestClass1
$T1.Disp(1,"Powershell","Microsoft")
$T1.ToString()
$T1.ToDept()

$T2 = New-Object TestClass2
$T2.Disp(2,"Python3","Science")
$T2.ToString()
$T2.ToDept()
$T2.Like()

$T3 = New-Object TestClass3
$T3.Disp(3,"Java","データ型が厳しい")
$T3.ToString()
$T3.ToDept()
$T3.Dislike()

