<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98405328-1', 'auto');
  ga('require', 'linkid');
  ga('send', 'pageview');

</script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right');
            bloginfo('name'); ?></title>
    <meta name="description" content="山口県防府市・山口市・周南市に展開する有限会社SECT（セクト）グループは、最上のおもてなし・楽しい会話・心からの癒しを通しヘアースタイルをデザインするだけでなく、より深いコミュニケーションを大切にしています。" />
    <meta name="keywords" content="SECT,セクト,美容室,山口,防府,周南" />
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
    <link href="../css/layout.css" rel="stylesheet">
    <link href="../css/navigation.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <?php if (is_singular('style') || is_post_type_archive('style') || is_tax('length') || is_tax('stylist')) : ?>
        <link href="../css/style.css" rel="stylesheet">
    <?php elseif (is_post_type_archive('staff') || is_tax('salon-staff') || is_singular('staff')) : ?>
        <link href="../css/staff.css" rel="stylesheet">
    <?php else : ?>
        <link href="../css/blog.css" rel="stylesheet">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body onload="initialize();">
    <h1 class="main_h1">山口県防府市・山口市・周南市の美容室｜有限会社SECT（セクト）</h1>

    <p class="sns_bt hidden-xs"><a href="https://www.facebook.com/%E3%82%BB%E3%82%AF%E3%83%88-107638769805951/" target="_blank"><img src="/img/common/bt_fb.png" width="55" height="55" alt="" /></a><a href="https://twitter.com/sectgroup" target="_blank"><img src="/img/common/bt_tw.png" width="55" height="55" alt="" /></a></p>
    <!-- ナビゲーション -->
    <div class="container">
        <p class="logo_layout hidden-xs"><a href="../index.html"><img src="/img/common/logo_sect.png" width="183" alt="" /></a></p>
        <div class="navbar navbar-inverse navbar-static-top fixed_area">
            <div class="container-fluid">
                <div class="navbar-header visible-xs">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <h1><a class="navbar-brand" href="../index.html"><img src="/img/common/logo_sect.png" alt="lashinvan"></a></h1>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.html">HOME<span>ホーム</span></a></li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">SHOP<span>ショップ</span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><a href="../shop/index.html">ラシンバン</a></li>
                                <li><a href="../shop/avance.html">アバンセ</a></li>
                                <li><a href="../shop/lamer.html">ラシンバン ラメール</a></li>
                                <li><a href="../shop/omfam.html">オムファム</a></li>
                            </ul>
                        </li>
                        <li><a href="../menu/index.html">MENU<span>メニュー</span></a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>/category/campaign">CAMPAIGN<span>キャンペーン</span></a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>/style">STYLE<span>スタイル</span></a></li>
                        <li><a href="../product/index.html">PRODUCT<span>商品紹介</span></a></li>
                        <li><a href="https://hair-sect-recruit.com/" target="_blank">RECRUIT<span>リクルート</span></a></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">BLOG<span>ブログ</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ナビゲーションここまで -->