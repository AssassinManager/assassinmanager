<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces;?>>
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css">  
  <link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css"> 
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php print $scripts; ?>
  <style type="text/css" media="all">
h1,h2,h3,h4,h5,h6 {font-family: 'PT Sans Narrow', Arial, sans-serif;}body {font-family: 'PT Sans', Arial, sans-serif;}#page-wrapper .content-section { color: #676767;}#post-wrapper .content-section { color: #676767;}#portfolio-single-wrapper .content-section { color: #676767;}#footer-widget ul li:before {background-image: url("img/glyphicons-halflings-white.png");} 
</style>
</head>
<body class="home blog <?php /*print $classes;*/ ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <div id="page-wrapper">
    <?php print $page; ?>
  </div>
  <?php print $page_bottom; ?>
</body>
</html>
