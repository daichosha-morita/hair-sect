// JavaScript Document
$(document).ready(function(){
$("a img" ).hover(function(){
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
