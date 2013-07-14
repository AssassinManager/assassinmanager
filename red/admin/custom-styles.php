<?php
	// custom styling options

	$themefolder = get_template_directory_uri();

	$header_font = get_option('mpt_theme_header_font');
	$body_font = get_option('mpt_theme_body_font');
	$customfont = get_option('mpt_theme_custom_web_font');
	$customheaderfont = esc_attr(get_option('mpt_theme_custom_web_font_header'));
	$custombodyfont = esc_attr(get_option('mpt_theme_custom_web_font_body'));

	$bodybgcolor = get_option('mpt_body_bg_color');
	$bodytextcolor = get_option('mpt_body_text_color');

	$linkcolor = get_option('mpt_link_font_color');
	$linkhovercolor = get_option('mpt_link_hover_font_color');

	$headersectionbg = get_option('mpt_header_section_bg_color');
	$headersectiontext = get_option('mpt_header_section_text_color');
	$headersectiontexthover = get_option('mpt_header_section_text_color_hover');
	$headersectionbgpattern = get_option('mpt_header_section_bg_pattern');
	$headersectionnavbgcolorhover = get_option('mpt_header_section_nav_bgcolor_hover');
	$headersectiondropdownbgcolor = get_option('mpt_header_section_dropdown_bgcolor');
	$headersectiondropdowntextcolor = get_option('mpt_header_section_dropdown_textcolor');
	$headersectiondropdownbgcolorhover = get_option('mpt_header_section_dropdown_bgcolor_hover');
	$headersectiondropdowntextcolorhover = get_option('mpt_header_section_dropdown_textcolor_hover');

	$homepagebgpattern = get_option('mpt_homepage_bg_pattern');
	$homepagebgcolor = get_option('mpt_homepage_bg_color');
	$homepagetextcolor = get_option('mpt_homepage_text_color');

	$pageheaderbg = get_option('mpt_page_header_section_bg_color');
	$pageheadertext = get_option('mpt_page_header_section_text_color');
	$pageheaderbgpattern = get_option('mpt_page_header_section_bg_pattern');
	$pagecontentbg = get_option('mpt_page_content_section_bg_color');
	$pagecontenttext = get_option('mpt_page_content_section_text_color');
	$pagecontentbgpattern = get_option('mpt_page_content_section_bg_pattern');

	$postheaderbg = get_option('mpt_post_header_section_bg_color');
	$postheadertext = get_option('mpt_post_header_section_text_color');
	$postheaderbgpattern = get_option('mpt_post_header_section_bg_pattern');
	$postcontentbg = get_option('mpt_post_content_section_bg_color');
	$postcontenttext = get_option('mpt_post_content_section_text_color');	
	$postcontentbgpattern = get_option('mpt_post_content_section_bg_pattern');

	$footerwidgetbg = get_option('mpt_footer_widget_bg_color');
	$footerwidgettext = get_option('mpt_footer_widget_text_color');
	$footerwidgetbgpattern = get_option('mpt_footer_widget_bg_pattern');
	$footerwidgetlink = get_option('mpt_footer_widget_link_color');
	$footerwidgetlinkhover = get_option('mpt_footer_widget_link_color_hover');
	$footerwidgeticoncolor = get_option('mpt_footer_widget_icon_color');

	$footersectionbg = get_option('mpt_footer_section_bg_color');
	$footersectiontext = get_option('mpt_footer_section_text_color');
	$footersectionbgpattern = get_option('mpt_footer_section_bg_pattern');
	$footersectionlink = get_option('mpt_footer_section_link_color');
	$footersectionlinkhover = get_option('mpt_footer_section_link_color_hover');
	
?>

<style type="text/css" media="all">
<?php 
	// Text Font

	if ($header_font != "" && $customfont != 'true') { 
		$header_font = str_replace('+', ' ', $header_font);

		echo "h1,h2,h3,h4,h5,h6 {font-family: '$header_font', Arial, sans-serif;}";
	}
	if ($body_font != "" && $customfont != 'true') { 
		$body_font = str_replace('+', ' ', $body_font);

		echo "body {font-family: '$body_font', Arial, sans-serif;}";
	} 


	if ($customfont == 'true' && !empty($customheaderfont)) {

		if (strpos($customheaderfont, '&')) {
			$customheaderfont = str_replace(strstr($customheaderfont, '&'),'',$customheaderfont);
		}

		if (strpos($customheaderfont, ':')) {
			$customheaderfont = str_replace(strstr($customheaderfont,':'),'',$customheaderfont);
		}
		
		$customheaderfont = str_replace('+', ' ', $customheaderfont);

		echo "h1,h2,h3,h4,h5,h6 {font-family: '$customheaderfont', Arial, sans-serif;}";

	}

	if ($customfont == 'true' && !empty($custombodyfont)) {

		if (strpos($custombodyfont, '&')) {
			$custombodyfont = str_replace(strstr($custombodyfont, '&'),'', $custombodyfont);
		}

		if (strpos($custombodyfont, ':')) {
			$custombodyfont = str_replace(strstr($custombodyfont, ':'),'', $custombodyfont);
		}

		$custombodyfont = str_replace('+', ' ', $custombodyfont);

		echo "body {font-family: '$custombodyfont', Arial, sans-serif;}";

	}

	// Main Body color
	if ($bodybgcolor !="") {
		echo 'body { background: ' . $bodybgcolor . ';}';
	}

	if ($bodytextcolor !="") {
		echo 'body { color: ' . $bodytextcolor . ';}';
	}

	// Link color
	if ($linkcolor !="") {
		echo 'a { color: ' . $linkcolor . ';}';
		echo '#portfolio-wrapper .tooltip4background { -webkit-box-shadow: 0px 0px 3px 2px ' . $linkcolor . '; box-shadow: 0px 0px 3px 2px ' . $linkcolor . ';}';
		echo '.port-folio .image-box:hover { -webkit-box-shadow: 0px 0px 3px 2px ' . $linkcolor . '; box-shadow: 0px 0px 3px 2px ' . $linkcolor . ';}';
		echo '#portfolio-single-wrapper .image-box:hover { -webkit-box-shadow: 0px 0px 3px 2px ' . $linkcolor . '; box-shadow: 0px 0px 3px 2px ' . $linkcolor . ';}';
	}

	if ($linkhovercolor !="") {
		echo 'a:hover { color: ' . $linkhovercolor . ';}';
	}

	// Header Section

	if ($headersectionbg != "") { 
		echo '#header-wrapper .navbar-inner { background: ' . $headersectionbg . ';}';
	}

	if ($headersectionbgpattern != "none") { 
		echo '#header-wrapper .navbar-inner {' . mpt_load_bg_patterns($headersectionbgpattern) . '}';
	}	

	if ($headersectiontext != "") { 
		echo '#header-wrapper .nav > li > a { color: ' . $headersectiontext . ';}';
		echo '#header-wrapper .nav li.dropdown > .dropdown-toggle .caret { border-top-color: ' . $headersectiontext . '; border-bottom-color: ' . $headersectiontext . '; }';
	}

	if ($headersectiontexthover != "") { 
		echo '#header-wrapper .nav > li.dropdown:hover > a.dropdown-toggle, #header-wrapper .nav > li > a:hover, #header-wrapper .nav > .active > a, #header-wrapper .nav > .active > a:hover, #header-wrapper .nav > .active > a:focus { color: ' . $headersectiontexthover . ';}';
		echo '#header-wrapper .nav li.dropdown:hover > .dropdown-toggle .caret { border-top-color: ' . $headersectiontexthover . '; border-bottom-color: ' . $headersectiontexthover . '; }';
	}

	if ($headersectionnavbgcolorhover != "") { 
		echo '#header-wrapper .nav > li > a:hover { background: ' . $headersectionnavbgcolorhover . ';}';
		echo '#header-wrapper .nav > li.dropdown:hover > a.dropdown-toggle, #header-wrapper .nav > .active > a, #header-wrapper .nav > .active > a:hover, #header-wrapper .nav > .active > a:focus { background: ' . $headersectionnavbgcolorhover . ';}';
		echo '#header-wrapper .nav li.dropdown.open > .dropdown-toggle, #header-wrapper .nav li.dropdown.active > .dropdown-toggle, #header-wrapper .nav li.dropdown.open.active > .dropdown-toggle { background: ' . $headersectionnavbgcolorhover . ';}';
		echo '#header-wrapper {border-top: 7px solid ' . $headersectionnavbgcolorhover . ';}';
	}

	if ($headersectiondropdownbgcolor != "") { 
		echo '#header-wrapper .dropdown-menu a, #header-wrapper .dropdown-submenu a, #header-wrapper .dropdown-menu { background: ' . $headersectiondropdownbgcolor . ';}';
		echo '.navbar .nav > li > .dropdown-menu:after {border-bottom: 6px solid ' . $headersectiondropdownbgcolor . ';}';
	}

	if ($headersectiondropdowntextcolor != "") { 
		echo '#header-wrapper .dropdown-menu a, #header-wrapper .dropdown-submenu a { color: ' . $headersectiondropdowntextcolor . ';}';
	}

	if ($headersectiondropdownbgcolorhover != "") { 
		echo '#header-wrapper .dropdown-menu .active > a,#header-wrapper .dropdown-menu .active > a:hover,#header-wrapper .dropdown-menu li > a:hover,#header-wrapper .dropdown-menu li > a:focus,#header-wrapper .dropdown-submenu:hover > a { background: ' . $headersectiondropdownbgcolorhover . ';}';
	}

	if ($headersectiondropdowntextcolorhover != "") { 
		echo '#header-wrapper .dropdown-menu .active > a,#header-wrapper .dropdown-menu .active > a:hover,#header-wrapper .dropdown-menu li > a:hover,#header-wrapper .dropdown-menu li > a:focus,#header-wrapper .dropdown-submenu:hover > a { color: ' . $headersectiondropdowntextcolorhover . ';}';
	}

	// Homepage Section

	if ($homepagebgcolor !="") {
		echo '#homepage-content-wrapper { background: ' . $homepagebgcolor . ';}';
	}

	if ($homepagetextcolor !="") {
		echo '#homepage-content-wrapper { color: ' . $homepagetextcolor . ';}';
	}

	if ($homepagebgpattern != "none") { 
		echo '#homepage-content-wrapper {' . mpt_load_bg_patterns($homepagebgpattern) . '}';
	}

	// Page Settings 
	if ($pageheaderbg != "") { 
		echo '#page-wrapper .header-section { background: ' . $pageheaderbg . ';}';
	}

	if ($pageheadertext != "") { 
		echo '#page-wrapper .header-section .page-header span { color: ' . $pageheadertext . '; border-bottom: 1px dashed ' .$pageheadertext.'; border-top: 1px dashed '.$pageheadertext.';}';
	}	

	if ($pageheaderbgpattern != "none") { 
		echo '#page-wrapper .header-section {' . mpt_load_bg_patterns($pageheaderbgpattern) . '}';
	}

	if ($pagecontentbg != "") { 
		echo '#page-wrapper .content-section { background: ' . $pagecontentbg . ';}';
	}

	if ($pagecontenttext != "") { 
		echo '#page-wrapper .content-section { color: ' . $pagecontenttext . ';}';
	}

	if ($pagecontentbgpattern != "none") { 
		echo '#page-wrapper .content-section {' . mpt_load_bg_patterns($pagecontentbgpattern) . '}';
	}	


	// Post Settings
	if ($postheaderbg != "") { 
		echo '#post-wrapper .header-section { background: ' . $postheaderbg . ';}';
		echo '#portfolio-single-wrapper .header-section { background: ' . $postheaderbg . ';}';
	}

	if ($postheadertext != "") { 
		echo '#post-wrapper .header-section .page-header span { color: ' . $postheadertext . '; border-bottom: 1px dashed ' .$postheadertext.'; border-top: 1px dashed '.$postheadertext.';}';
		echo '#portfolio-single-wrapper .header-section .page-header span { color: ' . $postheadertext . '; border-bottom: 1px dashed ' .$postheadertext.'; border-top: 1px dashed '.$postheadertext.';}';
	}	

	if ($postheaderbgpattern != "none") { 
		echo '#post-wrapper .header-section {' . mpt_load_bg_patterns($postheaderbgpattern) . '}';
		echo '#portfolio-single-wrapper .header-section {' . mpt_load_bg_patterns($postheaderbgpattern) . '}';
	}

	if ($postcontentbg != "") { 
		echo '#post-wrapper .content-section { background: ' . $postcontentbg . ';}';
		echo '#portfolio-single-wrapper .content-section { background: ' . $postcontentbg . ';}';
	}

	if ($postcontenttext != "") { 
		echo '#post-wrapper .content-section { color: ' . $postcontenttext . ';}';
		echo '#portfolio-single-wrapper .content-section { color: ' . $postcontenttext . ';}';
	}

	if ($postcontentbgpattern != "none") { 
		echo '#post-wrapper .content-section {' . mpt_load_bg_patterns($postcontentbgpattern) . '}';
		echo '#portfolio-single-wrapper .content-section {' . mpt_load_bg_patterns($postcontentbgpattern) . '}';
	}	

	// Footer Widget Settings

	if ($footerwidgetbg != "") { 
		echo '#footer-widget { background: ' . $footerwidgetbg . ';}';
	}

	if ($footerwidgettext != "") { 
		echo '#footer-widget { color: ' . $footerwidgettext . ';}';
	}

	if ($footerwidgetbgpattern != "none") { 
		echo '#footer-widget {' . mpt_load_bg_patterns($footerwidgetbgpattern) . '}';
	}	

	if ($footerwidgetlink != "") { 
		echo '#footer-widget a { color: ' . $footerwidgetlink . ';}';
	}

	if ($footerwidgetlinkhover != "") { 
		echo '#footer-widget a:hover { color: ' . $footerwidgetlinkhover . ';}';
	}

	if ($footerwidgeticoncolor == 'White') {
		echo '#footer-widget ul li:before {background-image: url("'.$themefolder.'/img/glyphicons-halflings-white.png");}';
	} else {
		echo '#footer-widget ul li:before {background-image: url("'.$themefolder.'/img/glyphicons-halflings.png");}';
	}

	// Footer Section

	if ($footersectionbg != "") { 
		echo '.footer-wrapper { background: ' . $footersectionbg . ';}';
	}

	if ($footersectiontext != "") { 
		echo '.footer-wrapper { color: ' . $footersectiontext . ';}';
	}

	if ($footersectionbgpattern != "none") { 
		echo '.footer-wrapper {' . mpt_load_bg_patterns($footersectionbgpattern) . '}';
	}	

	if ($footersectionlink != "") { 
		echo '.footer-wrapper a { color: ' . $footersectionlink . ';}';
	}

	if ($footersectionlinkhover != "") { 
		echo '.footer-wrapper a:hover { color: ' . $footersectionlinkhover . ';}';
	}

?>
 
</style>
