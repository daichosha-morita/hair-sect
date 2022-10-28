



 $(function(){
      $('.matchHeight, .shop .shop_box, .staff .staff_box, .oneday_box > div').matchHeight();
    });
	
	
	
	
//マウスオーバーで半透明

$(document).ready(function(){
$("a" ).hover(function(){
//↑.hover_imgはアニメーションを付けたい要素を指定します。
     $(this).stop().fadeTo(250,0.7);
                  //↑ここでの設定はカーソルを乗せたときの動き
         　　　//最初の指定でスピード指定、二番目の指定で透明度の指定
    },
    function(){
    $(this).stop().fadeTo(250,1.0);
                  //↑ここでの設定はカーソルが離れたときの動き
         　　　//最初の指定でスピード指定、二番目の指定で透明度の指定
    });
});



$(function() {
 var topBtn = $('#page-top');
 topBtn.hide();
 //スクロールが100に達したらボタン表示
 $(window).scroll(function () {
 if ($(this).scrollTop() > 300) {
 topBtn.fadeIn();
 } else {
 topBtn.fadeOut();
 }
 });
 //スクロールしてトップ
 topBtn.click(function () {
 $('body,html').animate({
 scrollTop: 0
 }, 350);
 return false;
 });
 });


// グローバルナビ固定
if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){
//ここに書いた処理はスマホ閲覧時は無効となる
$(window).on('load', function () {
  var $body = $('body'),
      $navTypeA = $('.fixed_area'),
      navTypeAOffsetTop = $navTypeA.offset().top;
  
  $(window).on('scroll', function () {
    if($(this).scrollTop() > navTypeAOffsetTop) {
      $body.addClass('is-fixed');
    } else {
      $body.removeClass('is-fixed');
    }
  });
});

}