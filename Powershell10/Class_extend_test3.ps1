#####クラスの継承処理テストPowershell ##########################
##### Create Date  2021/8/27                   #################
##### Create Author  乃木坂好きのITエンジニア  #################

# スーパークラス定義
class Nogizaka{
    [string] msg(){
        return "乃木坂46"
    }
}

# サブクラス(継承するクラス)定義
class Ikkisei : Nogizaka {
     [string] msg2(){
        $Data = ([Nogizaka]$this).msg()
        $Data += "の1期生は10年活動している"
        return $Data
    }
}
class Nikisei : Nogizaka {
     [string] msg3(){
        $Data = ([Nogizaka]$this).msg()
        $Data += "の2期生は8年活動している"
        return $Data
    }
}

class Sankisei : Nogizaka {
     [string] msg4(){
        $Data = ([Nogizaka]$this).msg()
        $Data += "の3期生は5年活動している"
        return $Data
    }
}
class Yonkisei : Nogizaka {
     [string] msg5(){
        $Data = ([Nogizaka]$this).msg()
        $Data += "の4期生は3年活動している"
        return $Data
    }
}
class ShinYonki : Yonkisei {
    [string] msg6(){
        $Data = ([Nogizaka]$this).msg()
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
$TestObject3 = New-Object Yonkisei
$TestObject3.msg5()
$TestObject4 = New-Object ShinYonki
$TestObject4.msg6()

