'use strict';

{
  // オブジェクト配列の定義
  const posts = [
    {
      text:'JavaScriptの勉強中・・・',
      likeCount:0,
      // メソッド
      show() {
        console.log(`${this.text} - ${this.likeCount}いいね`);
      }
    },
    {
      text:'プログラミング楽しい！',
      likeCount:0,
      show() {
        console.log(`${this.text} - ${this.likeCount}いいね`);
      }
    },
  ];


  // オブジェクト配列の数を取得
  const num = posts.length;
  // 要素を取り出す
  for(let i=0;i<num;i++){
    posts[i].show();
  }
}
