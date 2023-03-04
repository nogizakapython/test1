'use strict';

{
  // オブジェクト配列の定義
  class Nogizaka1 {
    constructor(name){
      this.name = name;
      this.likeCount = 1;
    }
    // showメソッド
    show() {
      document.write(`<p>${this.name} - ${this.likeCount}倍好き</p>`);
    }

    // likeメソッド
    like(){
      this.likeCount *= 2;
      this.show();
    }

    ylike(){
      this.likeCount *= 10;
      this.show();
    }


  }


  const data1 = new Nogizaka1("鈴木絢音");
  data1.like();
  data1.ylike();
  const data2 = new Nogizaka1("山下美月");
  data2.like();
  data2.ylike();


}
