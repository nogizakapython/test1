# Powershell class Test8
# 新規作成 2023/4/4

class TestClass8 {
    [int] $ID
    [String] $Name
    [String] $Address
    
    
    #コンストラクタ
    Disp([int] $ID,[String] $Name,[String] $Address) {
        $this.Id = $Id
        $this.Name = $Name
        $this.Address = $Address

    
    }
    #ToStringメソッド
    [String] ToString() {
        return "Id=" + $this.Id + ",Name=" + $this.Name
    }
    #ToNameメソッド
    [String] ToName() {
        return "私の名前は" + $this.Name + "です。"
    }

    #ToAddressメソッド
    [String] ToAddress() {
        return "私の住所は" + $this.Address + "です。"
    }
    


}

# TestClass10を継承して、testClass11を作成する。
class TestClass20 : TestClass8 {
    [int] $ID
    [String] $Name
    [String] $Address
    
    
    #コンストラクタ
    Disp([int] $ID,[String] $Name,[String] $Address,[String] $Station) {
        $this.Id = $Id
        $this.Name = $Name
        $this.Address = $Address
        

    
    }
    [String] ToName(){
        $Data = ([Testclass8]$this).ToName()
        $Data += "男性です"
        return $Data
    }
    [String] ToAddress(){
        $Adr = ([Testclass8]$this).ToAddress()
        $Adr += "上大岡"
        $Adr += "に移住予定です。"
        $Adr += "京急本線を使います。"
        return $Adr
    }

    
}

$T1 = New-Object TestClass8
$T1.Disp(1,"Taro","愛知県名古屋市中村区")
$T1.ToString()
$T1.ToName()
$T1.ToAddress()

$T2 = New-Object TestClass20
$T2.Disp(2,"Jiro","神奈川県横浜市南区","上大岡")
$T2.ToString()
$T2.ToName()
$T2.ToAddress()
