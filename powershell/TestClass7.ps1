# Powershell class Test10
# 新規作成 2023/3/15

class TestClass10 {
    [int] $ID
    [String] $Name
    [String] $Address
    
    
    #コンストラクタ
    TestClass10([int] $ID,[String] $Name,[String] $Address) {
        $this.Id = $Id
        $this.Name = $Name
        $this.Address = $Address
    }

    TestClass10(){
        $this.Id = 0
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
    testClass11():base(){
    }
    #ToStringメソッド
    [String] ToString() {
        return "Id=" + $this.Id + ",Name=" + $this.Name
    }

    [String] ToName(){
        $Data = ([Testclass10]$this).ToName()
        $Data += "男性です"
        return $Data
    }
    [String] ToAddress(){
        $Adr = ([Testclass10]$this).ToAddress()
        $Adr += "上大岡"
        $Adr += "に移住予定です"
        return $Adr
    }

}

# TestClass10を継承して、testClass12を作成する。
class TestClass12 : TestClass10{
    [String] $Details1
    TestClass12():base(){
    }

    #コンストラクタ
    TestClass12([String] $Details1 ): base([int] $Id,[String] $Name,[String] $Address ) {
        
        $this.Details1 = $Details1
    }
    [String] ToDetail() {
        return $this.Details1
    }

}



$T1 = New-Object TestClass10
$T1.TestClass10(1,"Taro","愛知県名古屋市中区")
$T1.ToString()
$T1.ToName()
$T1.ToAddress()

$T2 = New-Object TestClass11
$T2.TestClass11(2,"Jiro","神奈川県横浜市港南区")
$T2.ToString()
$T2.ToName()
$T2.ToAddress()


$T3 = New-Object TestClass12
$T3.TestClass12(3,"Mio","神奈川県港北区日吉","矢上キャンパスの近くに在住しています")
$T3.ToString()
$T3.ToName()
$T3.ToAddress()
$T3.ToDetail()
