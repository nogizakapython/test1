# Powershell class Test10
# 新規作成 2023/3/15

class TestClass10 {
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
class TestClass11 : TestClass10{
    [String] ToName(){
        $Data = ([Testclass10]$this).ToName()
        $Data += "男性です"
        return $Data
    }
    [String] ToAddress(){
        $Adr = ([Testclass10]$this).ToAddress()
        $Adr += "上大岡駅の近所に住んでいます。"
        return $Adr
    }

}

$T1 = New-Object TestClass10
$T1.Disp(1,"Taro","愛知県名古屋市中区")
$T1.ToString()
$T1.ToName()
$T1.ToAddress()

$T2 = New-Object TestClass11
$T2.Disp(2,"Jiro","神奈川県横浜市港南区")
$T2.ToString()
$T2.ToName()
$T2.ToAddress()
