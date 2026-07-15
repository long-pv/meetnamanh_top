<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RQ7CYVEGR9"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { window.dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-RQ7CYVEGR9');
  </script>

  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="">
  
  <style>
    /* Fix for asset paths dynamically matching theme directory */
    @font-face {
      font-family: Archivo;
      font-style: normal;
      font-weight: 500;
      font-stretch: 100%;
      font-display: swap;
      src: url(<?php echo get_template_directory_uri(); ?>/template-html/fonts/Qawz4oO017QF.woff2) format("woff2");
      unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB
    }
    @font-face {
      font-family: Archivo;
      font-style: normal;
      font-weight: 500;
      font-stretch: 100%;
      font-display: swap;
      src: url(<?php echo get_template_directory_uri(); ?>/template-html/fonts/vq3MknDG10DC.woff2) format("woff2");
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
    }
  </style>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
