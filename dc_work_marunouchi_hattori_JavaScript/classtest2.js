'use strict';

{
  // オブジェクト配列の定義
  const posts = [
    {
      text:'JavaScriptの勉強中・・・',
      likeCount:0,
    },
    {
      text:'プログラミング楽しい！',
      likeCount:0,
    },
  ];

  // show関数
  function show(post) {
    console.log(`${post.text} - ${post.likeCount}いいね`);
  }
  // オブジェクト配列の数を取得
  const num = posts.length;
  // 要素を取り出す
  for(let i=0;i<num;i++){
    show(posts[i]);
  }
}
