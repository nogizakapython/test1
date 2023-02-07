#####クラスの継承処理テストPowershell ##########################
##### Create Date  2021/8/30                   #################
##### Create Author  乃木坂好きのITエンジニア  #################

# スーパークラス定義
class Hinatazaka{
    [string] msg(){
        return "日向坂46"
    }
}

# サブクラス(継承するクラス)定義
class Ikkisei : Hinatazaka {
     [string] msg2(){
        $Data = ([Hinatazaka]$this).msg()
        $Data += "の1期生は4年活動している"
        return $Data
    }
}
class Nikisei : Hinatazaka {
     [string] msg3(){
        $Data = ([Hinatazaka]$this).msg()
        $Data += "の2期生は3年活動している"
        return $Data
    }
}

class Sankisei : Hinatazaka {
     [string] msg4(){
        $Data = ([Hinatazaka]$this).msg()
        $Data += "の3期生は2年活動している"
        return $Data
    }
}

class ShinSanki : Sankisei {
    [string] msg5(){
        $Data = ([Hinatazaka]$this).msg()
        $Data += "の新4期生は1年活動している"
        return $Data
    }	
}

# インスタンス化
$TestObject = New-Object Ikkisei
$TestObject.msg2()
$TestObject1 = New-Object Nikisei
$TestObject1.msg3()
$TestObject2 = New-Object Sankisei
$TestObject2.msg4()
$TestObject3 = New-Object Shinsanki
$TestObject3.msg5()
