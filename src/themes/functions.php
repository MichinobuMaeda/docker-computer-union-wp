<?php
ini_set('display_errors', 0);

function add_meta_twitter_card() {
?>

<!-- Twitter summary card -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@cu_ssms" />
<meta name="twitter:title" content="コンピュータ・ユニオンはIT業界で働く人たちの個人加盟の労働組合です。職場に労働組合がなくてだいじょうぶ。契約社員、派遣、フリーランスの人もぜひご加入ください。求職中の方には職安法45条に基づく労働者供給事業で仕事の紹介をいたします。" />
<meta name="twitter:image" content="https://computer-union.jp/wp-content/uploads/2022/11/cropped-cu_logo_512.png" />

<?php
}

function add_analytics_tags() {
?>

<!-- Material Design Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Yahoo! site general -->
<script async src="https://s.yimg.jp/images/listing/tool/cv/ytag.js"></script>
<script>
  window.yjDataLayer = window.yjDataLayer || [];
  function ytag() { yjDataLayer.push(arguments); }
  ytag({"type":"ycl_cookie"});
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-69212569-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-69212569-1');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2PK41FN64P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'G-2PK41FN64P');
</script>
<!-- Event handling: Contact Form 7 'mailsent' -->
<script>
  document.addEventListener( 'wpcf7mailsent', function( event ) {
    gtag('event', 'submit', {
      'event_category': 'wpcf7mailsent',
      'event_label': event.detail.contactFormId,
      'value': 1
    });
    ytag({
      "type": "yss_conversion",
      "config": {
        "yahoo_conversion_id": "1000951984",
        "yahoo_conversion_label": "6hiuCMKtluUCEJD5wp4D",
        "yahoo_conversion_value": "1"
      }
    });
  });
</script>
<?php
}

add_action( 'wp_head', 'add_meta_twitter_card' );
add_action( 'wp_head', 'add_analytics_tags' );
