'use strict';

const s_array = ["山下美月","賀喜遥香","久保史緒里","遠藤さくら","筒井あやめ","梅澤美波","金川紗耶","早川聖来","岩本蓮加","柴田柚菜","弓木奈於","松尾美佑","佐藤璃果","田村真佑","与田祐希"];

const f_array = ["山下美月","賀喜遥香","久保史緒里","遠藤さくら","筒井あやめ","梅澤美波","田村真佑","与田祐希"];

{
  // オブジェクト配列の定義
  class Member {
    constructor(name){
      this.name = name;
      this.text1 ="選抜メンバー";
      this.text2 ="福神メンバー"
    }
    // showメソッド
    show() {
      console.log(`${this.name}さんは乃木坂46のメンバーです`);
    }
    senbatsushow(){
      var s_c = 0;
      s_array.forEach((data) => {
        if (this.name == data){
          console.log(`${this.name}さんは乃木坂46の${this.text1}です`);
          s_c += 1;
        }
      })
      if(s_c == 0){
          console.log(`${this.name}さんは乃木坂46の${this.text1}ではありません`);
      }
    }
    fukujinshow(){
      var f_c = 0;
      f_array.forEach((data) => {
        if (this.name == data){
          console.log(`${this.name}さんは乃木坂46の${this.text2}です`);
          f_c += 1;
        }
      })
      if (f_c == 0){
          console.log(`${this.name}さんは乃木坂46の${this.text2}ではありません`);
      }

    }
  }


  const data = [
      new Member("林瑠奈"),
      new Member("山下美月"),
      new Member("岩本蓮加"),
      new Member("筒井あやめ"),
      new Member("向井葉月")
  ];

  data.forEach((men) => {
      men.show();
      men.senbatsushow();
      men.fukujinshow();
  });

}
