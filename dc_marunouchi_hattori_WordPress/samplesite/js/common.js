
$(function(){
    var element = $('#pageTop');
    // スクロール量の設定
    var position = 400; // 単位：px
    // スクロールすると表示するエリアを非表示
    element.hide();
    $(window).scroll(function(){
        // スクロールすると表示させる
        if ($(this).scrollTop() > position) {
            $(element).fadeIn();
        } else {
            $(element).fadeOut();
        }
    });
});


/* ===================================================================

 * スムーススクロール

=================================================================== */
$(function(){
    // #で始まるアンカーをクリックした場合に処理
    $('a[href^=#]').click(function() {
        // スクロールの速度
        var duration = 400;// ミリ秒
        // アンカーの値取得
        var href= $(this).attr("href");
        // 移動先を取得
        var target = $(href == "#" || href == "" ? 'html' : href);
        // 移動先を数値で取得
        var position = target.offset().top;
        // スムーススクロール
        $('body,html').animate({scrollTop:position}, duration, 'swing');
        return false;
    });
});


/* ===================================================================

 * スライドショー

=================================================================== */
$.fn.slideshow = function(options) {
    // オプション
    var o = $.extend({
        autoSlide    : true,
        effect       : 'fade',
        type         : 'repaet',
        easing       : 'liner',
        interval     : 3000,
        duration     : 1000,
        imgHoverStop : true,
        navHoverStop : true
    }, options);

    // セレクター
    var $slider     = $(this),
        $container  = $slider.find('.slide-inner'),
        $element    = $container.children(),
        $prevNav    = $slider.find('.s-prev'),
        $nextNav    = $slider.find('.s-next'),
        $controlNav = $slider.find('.cont-nav');

    // カウンター初期化
    var current = 0;
    var next = 1;

    // PREV/NEXTフラグ
    var flag = 'nextElement';

    // ストップフラグ
    var stopFlag = false;

    // スマホ判定
    var onClick = ('ontouchstart' in document) ? 'touchstart' : 'click';

    // 最初の要素だけ表示する
    $element.not(':first').css('display' , 'none');

    // 読み込み時
    $(window).on('load resize', function(){
        // 要素の高さを取得
        elementHeight();
        // ナビゲーションの位置を取得
        var nextNavPosition = ($element.height() - $nextNav.find('img').height()) / 2;
        $prevNav.css('top', nextNavPosition +'px');
        $nextNav.css('top', nextNavPosition +'px');
    });

    // 画像の高さ分、表示領域を確保
    var elementHeight = function(){
        $container.height($element.height());
    };

    // 画像が一枚のときはスライドショーにしない
    if($element.length <= 1 ){
        $slider.css('padding-bottom' , '0');
        $prevNav.css('display' , 'none');
        $nextNav.css('display' , 'none');
        return false;
    }

    // 自動切り替えスタート
    var start;
    var startTimer = function () {
        start = setInterval(function(){change();}, o.interval);
    };

    // 自動切り替えストップ
    var stopTimer = function () {
         clearInterval(start);
    };

    // 繰り返しなしの場合PREVボタン非表示
    if (o.type == 'stop') {
        $prevNav.hide();
    }

    // 要素を切り替えるスクリプト
    var change = function(){
        // PREV/NEXTボタンデザイン
        if (o.type == 'stop') {
            if(next > 0){
                $prevNav.fadeIn('slow');
            }else{
                $prevNav.fadeOut('slow');
            }
        }

        // コントールナビデザイン
        $controlNav.children('span').removeClass('current');
        $controlNav.children('span:eq(' + next + ')').addClass('current');

        // フェードしながら切り替える場合
        if (o.effect == 'fade') {
            $($element[current]).not(':animated').fadeOut(o.duration);
            $($element[next]).not(':animated').fadeIn(o.duration);

        // スライドしながら切り替える場合
        } else if  (o.effect == 'slide') {
            var elementWidth = $container.width();
            $element.css('display', 'block');
            $element.css('width', elementWidth +'px');
            if(flag == 'prevElement') {
                $element.css('left', - elementWidth +'px');
                $($element[current]).css('left', 0 +'px');
                $($element[current]).not(':animated').animate({'left': '+=' + elementWidth +'px'}, o.duration, o.easing);
                $($element[next]).not(':animated').animate({'left': '+=' + elementWidth +'px'}, o.duration, o.easing);
            }
            if(flag == 'nextElement') {
                $element.css('left', elementWidth +'px');
                $($element[current]).css('left', 0 +'px');
                $($element[current]).not(':animated').animate({'left': '-=' + elementWidth +'px'}, o.duration, o.easing);
                $($element[next]).not(':animated').animate({'left': '-=' + elementWidth +'px'}, o.duration, o.easing);
            }
        }

        // リピートする場合
        if (o.type == 'repeat') {
            if ((next + 1) < $element.length) {
                 current = next;
                 next++;
            } else {
                 current = $element.length - 1;
                 next = 0;
            }
        }

        // 最後の要素でストップする場合
        if (o.type == 'stop') {
            if ((next + 1) < $element.length) {
                current = next;
                next++;
                $nextNav.fadeIn();
            } else {
                current = $element.length - 1;
                next = 0;
                stopTimer();
                $nextNav.fadeOut();
                stopFlag = true;
          }
        }
    };

    // PREVボタン
    var prevSlide = function () {
        flag = 'prevElement';
        if(current == 0) {
            next = $element.length - 1;
        }else {
            next = current -1;
        }
        stopTimer();
        change();
        if(!o.navHoverStop && !stopFlag && o.autoSlide) {
            startTimer();
        }
        if('ontouchstart' in document) {
            if(!stopFlag && o.autoSlide) {
                startTimer();
            }
        }
        flag = 'nextElement';
    }

    // NEXTボタン
    var nextSlide = function () {
        flag = 'nextElement';
        stopTimer();
        change();
        if(!o.navHoverStop && !stopFlag && o.autoSlide) {
            startTimer();
        }
        if('ontouchstart' in document) {
            if(!stopFlag && o.autoSlide) {
                startTimer();
            }
        }
    }

    // PREVスライド
    $prevNav.on(onClick,function() {
        if($element.is(':animated')) {
            return false;
        }
        prevSlide();
    });

    // NEXTスライド
    $nextNav.on(onClick,function() {
        if($element.is(':animated')) {
            return false;
        }
        nextSlide();
    });

    // コントローラーの生成
    $element.each(function (i) {
        $('<span/>').text(i + 1).appendTo($controlNav).on('click',function() {
            if($element.is(':animated')) {
                return false;
            }
            if(i < current) {
                flag='prevElement';
            } else if(i > current) {
                flag='nextElement';
            }
            if(i != current) {
                if(i == $element.length) {
                    next = 0;
                }else {
                    next = i;
                }
                stopTimer();
                change();
                if(!o.navHoverStop && !stopFlag && o.autoSlide) {
                    startTimer();
                }
                if('ontouchstart' in document) {
                    if(!stopFlag && o.autoSlide) {
                        startTimer();
                    }
                }
                flag = 'nextElement';
            }
        });
    });
    $controlNav.find('span:first-child').addClass('current');

    // タッチパネルはホバー動作無効
    if(!('ontouchstart' in document)) {
        // 画像にホバーした際の動作
        if(o.imgHoverStop){
            $container.hover(function() {
                stopTimer();
            },function() {
                if(!stopFlag && o.autoSlide) {
                    startTimer();
                }
            });
        }

        // ナビゲーションにホバーした際の動作
        if(o.navHoverStop){
            $prevNav.hover(function() {
                stopTimer();
            },function() {
                if(!stopFlag && o.autoSlide) {
                    startTimer();
                }
            });

            $nextNav.hover(function() {
                stopTimer();
            },function() {
                if(!stopFlag && o.autoSlide) {
                    startTimer();
                }
            });

            $controlNav.hover(function() {
                stopTimer();
            },function() {
                if(!stopFlag && o.autoSlide) {
                    startTimer();
                }
            });
        }
    }

    // タッチパネル対応
    $element.on('touchstart', touchStart);
    $element.on('touchmove' , touchMove);

    // タップした位置をメモリーする
    function touchStart(e) {
        var pos = Position(e);
        $element.data('memory',pos.x);
    }

    // スワイプ（タップした位置からプラスかマイナスかで左右移動を判断）
    function touchMove(e) {
        // 位置情報を取得
        var pos = Position(e);
        // 左から右へスワイプ
        if( pos.x > $element.data('memory') ){
            if($element.is(':animated')) {
                return false;
            }
            prevSlide();
        // 右から左へスワイプ
        }else{
            if($element.is(':animated')) {
                return false;
            }
            nextSlide();
        }
    }

    // 現在位置を取得
    function Position(e){
        var x = Math.floor(e.originalEvent.touches[0].pageX)
        var y = Math.floor(e.originalEvent.touches[0].pageY);
        var pos = {'x':x , 'y':y};
        return pos;
    }

    // 自動スタート設定
    if(o.autoSlide){
        startTimer();
    }

};

