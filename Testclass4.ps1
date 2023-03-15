# Powershell class Test4
# 新規作成 2023/3/15

class TestClass4{
    [int] $ID
    [String] $Name
    
    
    #コンストラクタ
    Disp([int] $ID,[String] $Name) {
        $this.Id = $Id
        $this.Name = $Name
    
    }
    #ToStringメソッド
    [String] ToString() {
        return "Id=" + $this.Id + ",Name=" + $this.Name
    }
    #ToNameメソッド
    [String] ToName() {
        return "私の名前は" + $this.Name + "です。"
    }
    


}

# TestClass4を継承して、testClass5を作成する。
class TestClass5 : TestClass4{
    [String] Livein(){
        $Data = ([Testclass4]$this).ToName()
        $Data += "出身は立川市です"
        return $Data
    }
}

$T1 = New-Object TestClass4
$T1.Disp(1,"白石麻衣")
$T1.ToString()
$T1.ToName()

$T2 = New-Object TestClass5
$T2.Disp(2,"山下美月")
$T2.ToString()
$T2.ToName()
$T2.Livein()