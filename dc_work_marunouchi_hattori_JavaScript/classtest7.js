'use strict';

{
  // オブジェクト配列の定義
  class Post {
    constructor(text){
      this.text = text;
      this.likeCount = 0;
    }
    // showメソッド
    show() {
      console.log(`${this.text} - ${this.likeCount}いいね`);
    }

    // likeメソッド
    like(){
      this.likeCount++;
      this.show();
    }



  }

  class SponsorPost {
    constructor(text,sponsor){
      this.text = text;
      this.likeCount = 0;
      this.sponsor = sponsor;
    }
    // showメソッド
    show() {
      console.log(`${this.text} - ${this.likeCount}いいね`);
      console.log(`...sponsored by ${this.sponsor}`);
    }

    // likeメソッド
    like(){
      this.likeCount++;
      this.show();
    }



  }
  const posts = [
    new Post('JavaScriptの勉強中'),
    new Post('プログラミング楽しい！'),
  ];

  const sponsors = [
    new SponsorPost('3分動画でマスターしよう','dotinstall'),

  ];

  // オブジェクト配列の数を取得
  const num = posts.length;
  // 要素を取り出す
  for(let i=0;i<num;i++){
    posts[i].like();
  }
  const num2 = sponsors.length;
  for(let j=0;j<num2;j++){
    sponsors[j].like();
  }
}
