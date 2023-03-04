'use strict';

const s_array = ["山下美月","賀喜遥香","久保史緒里","遠藤さくら","筒井あやめ","梅澤美波","金川紗耶","早川聖来","岩本蓮加","柴田柚菜","弓木奈於","松尾美佑","佐藤璃果","田村真佑","与田祐希"];

const f_array = ["山下美月","賀喜遥香","久保史緒里","遠藤さくら","筒井あやめ","梅澤美波","田村真佑","与田祐希"];

{
  // オブジェクト配列の定義
  class Member {
    constructor(name){
      this.name = name;

    }
    // showメソッド
    show() {
      console.log(`${this.name}さんは乃木坂46のメンバーです`);
    }
  }

  // 子クラス
  class SenbatsuMember extends Member {
    constructor(name){
      super(name)
      this.text = "選抜メンバー"
    }
    // showメソッド
    show() {
      super.show();
      var s_c = 0;
      s_array.forEach((data) => {
        if (this.name == data){
          console.log(`${this.name}さんは乃木坂46の${this.text}です`);
          s_c += 1;
        }
      })
      if(s_c == 0){
          console.log(`${this.name}さんは乃木坂46の${this.text}ではありません`);
      }

    }
  }

  // 子クラス
  class Fukujin extends Member {
    constructor(name){
      super(name)
      this.text = "福神メンバー"
    }
    // showメソッド
    show() {
      var f_c = 0;
      super.show();
      f_array.forEach((data) => {
        if (this.name == data){
          console.log(`${this.name}さんは乃木坂46の${this.text}です`);
          f_c += 1;
        }
      })
      if (f_c == 0){
          console.log(`${this.name}さんは乃木坂46の${this.text}ではありません`);
      }

    }
  }


  var s = new SenbatsuMember("林瑠奈");
  s.show();
  var f = new Fukujin("林瑠奈");
  f.show();

  s = new SenbatsuMember("山下美月");
  s.show();
  f = new Fukujin("山下美月");
  f.show();

  s = new SenbatsuMember("早川聖来");
  s.show();
  f = new Fukujin("早川聖来");
  f.show();


}
