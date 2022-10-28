<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * データベース設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** データベース設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'hair-sect' );

/** データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** データベースのパスワード */
define( 'DB_PASSWORD', 'suepass' );

/** データベースのホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2Xcp9U<~%GkocpOql0/t,K{7cq`nm%kt^3DJiEF,k)^L#7RA-NCMo>[]5!kE$=)5' );
define( 'SECURE_AUTH_KEY',  'aGL_w;]noONTR|]UU5bEj)ncGL5AATI?pj2i{rAif=px~nQI,>58GDVYlN+8+V(w' );
define( 'LOGGED_IN_KEY',    '6:6yKL+&3fWW|%hkAODT MSWr/&% bj*TPd`:%i}*!O`_bP*YZ9SdpVZD^%% k23' );
define( 'NONCE_KEY',        '@*a9 V_(q3<9Z%N9]|aTm@u/up4C4;;DM6u$DT$Oub?nWMs:.*G8}rk1o%X,L66:' );
define( 'AUTH_SALT',        '-N@5$8ic7i>qD[@K5-~@>KxlQ,f$3?5t(q[hjunjVm.8n*? h<G!zU:{ru+E_$Gs' );
define( 'SECURE_AUTH_SALT', 'i#b]i|U~&g$||0jK`>#%y2sz{aP_XFH_rziCG0?A]WM(7o:.tSJqspv}^5S.vT`<' );
define( 'LOGGED_IN_SALT',   'Ie3[IMg4zMYx)ouwl4PIrEzK4`g-Aw6-V|$Xx$EyfTcQi>$sr_cc]WLF3)sD=?I|' );
define( 'NONCE_SALT',       'm5CHAZ95L`^Z-jgC]CZaT=u9mj<eu-I4`i2z&nVoMn)7gQs;v``0[Ps3wK&KySdb' );
define( 'WP_CACHE_KEY_SALT','Im9amhpb_Te[zb*O>/Jq__vDftggD`7iUpel[/n@Q9m/mf (4fh}O1~<g%<P02l%' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
