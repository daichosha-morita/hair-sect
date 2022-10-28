$(document).ready(function(){
 var obj = $('.bxslider').bxSlider({
 mode:'fade', //エフェクトの種類
 speed      : 1500, //エフェクトのスピード
 pager      : true , //ページャーの有無
 controls: false , 
 auto       : true, //自動再生
 touchEnabled: true //スワイプできるようにするか否か（スマートフォン）
 });
});