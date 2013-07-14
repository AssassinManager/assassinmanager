<?php

/**
 * general setting functions.
 *
 */

	// load site logo
	function mpt_load_site_logo() {
		$themefolder = get_template_directory_uri();
		$siteurl = get_bloginfo('siteurl');
		$mpt_logo_upload = esc_url(get_option('mpt_sitelogo'));
		if(!empty($mpt_logo_upload)) {
			echo '<center><a href="'.$siteurl.'"><img src="'.$mpt_logo_upload.'" alt="" /></a></center>';
		 } else {
			echo '<center><a href="'.$siteurl.'"><img src="'.$themefolder.'/img/site-logo.png" alt="" /></a></center>';
		}
	}

	//load site favicon
	function mpt_load_favicon() {
		$mpt_favicon_upload = esc_url(get_option('mpt_favicon'));
		if(!empty($mpt_favicon_upload)) {
			echo $mpt_favicon_upload;
		 } else {
			echo '';
		}
	}

	//load footer text
	function mpt_load_footer_text() {
		$customfooter = get_option('mpt_cus_footer');
		$custom = wp_kses( $customfooter, array(
					'a' => array(
						'href' => array(),
						'title' => array()
						),
					'br' => array(),
					'em' => array(),
					'strong' => array() 
					) ); 
		$date = date("Y");
		$sitename = esc_attr(get_bloginfo('name'));
			if(!empty($custom)) {
				echo '<p>'.$custom.'</p>';
			 } else {
				echo '<p>Copyright &copy;'.$date.' '.$sitename.' | Designed by <a href="http://www.smashingadvantage.com"><b>Smashing Advantage</b></a></p>';
			}
	}
	
/**
 * Styling Options.
 *
 */	

	function mpt_load_base_style() {
		$selected = get_option('mpt_theme_base_style');
		$themefolder = get_template_directory_uri();
		switch ($selected) {
			case 'Light Blue':
				echo '<link href="'.$themefolder.'/styles/color-lightblue.css" type="text/css" rel="stylesheet" />';
			break;
			case 'Blue':
				echo '<link href="'.$themefolder.'/styles/color-blue.css" type="text/css" rel="stylesheet" />';
			break;
			case 'Red':
				echo '<link href="'.$themefolder.'/styles/color-red.css" type="text/css" rel="stylesheet" />';
			break;
			case 'Yellow':
				echo '<link href="'.$themefolder.'/styles/color-yellow.css" type="text/css" rel="stylesheet" />';
			break;
			case 'Green':
				echo '<link href="'.$themefolder.'/styles/color-green.css" type="text/css" rel="stylesheet" />';
			break;
			case 'Black':
				echo '<link href="'.$themefolder.'/styles/color-black.css" type="text/css" rel="stylesheet" />';
			break;
			default:
				echo '<link href="'.$themefolder.'/styles/color-lightblue.css" type="text/css" rel="stylesheet" />';
			break;
		}
	}
	
	function mpt_load_google_web_font_header() {
		$selected = get_option('mpt_theme_header_font');
		$customfont = get_option('mpt_theme_custom_web_font');
		$customheaderfont = esc_attr(get_option('mpt_theme_custom_web_font_header'));

		if ($customfont != 'true' || empty($customheaderfont)) {
			$selected = str_replace(' ', '+', $selected);
			echo '<link href="http://fonts.googleapis.com/css?family='.$selected.'" rel="stylesheet" type="text/css">';
		}
	}
	
	function mpt_load_google_web_font_body() {
		$selected = get_option('mpt_theme_body_font');
		$customfont = get_option('mpt_theme_custom_web_font');
		$custombodyfont = esc_attr(get_option('mpt_theme_custom_web_font_body'));

		if ($customfont != 'true' || empty($custombodyfont)) {
			$selected = str_replace(' ', '+', $selected);
			echo '<link href="http://fonts.googleapis.com/css?family='.$selected.'" rel="stylesheet" type="text/css">';
		}
	}

	function mpt_load_custom_google_font_header() {
		$customfont = get_option('mpt_theme_custom_web_font');
		$customheaderfont = esc_attr(get_option('mpt_theme_custom_web_font_header'));

		if ($customfont == 'true' && !empty($customheaderfont)) {
			echo '<link href="http://fonts.googleapis.com/css?family='.$customheaderfont.'" rel="stylesheet" type="text/css">';
		}
	}

	function mpt_load_custom_google_font_body() {
		$customfont = get_option('mpt_theme_custom_web_font');
		$custombodyfont = esc_attr(get_option('mpt_theme_custom_web_font_body'));

		if ($customfont == 'true' && !empty($custombodyfont)) {
			echo '<link href="http://fonts.googleapis.com/css?family='.$custombodyfont.'" rel="stylesheet" type="text/css">';
		}
	}

	function mpt_load_bg_patterns($bgpattern) {
		$themefolder =  get_template_directory_uri();
		switch ($bgpattern) {
			case 'pattern_1':
				return "background-image: url('".$themefolder."/img/patterns/pat_01.png');";
			break;
			case 'pattern_2':
				return "background-image: url('".$themefolder."/img/patterns/pat_02.png');";
			break;
			case 'pattern_3':
				return "background-image: url('".$themefolder."/img/patterns/pat_03.png');";
			break;
			case 'pattern_4':
				return "background-image: url('".$themefolder."/img/patterns/pat_04.png');";
			break;
			case 'pattern_5':
				return "background-image: url('".$themefolder."/img/patterns/pat_05.png');";
			break;
			case 'pattern_6':
				return "background-image: url('".$themefolder."/img/patterns/pat_06.png');";
			break;
			case 'pattern_7':
				return "background-image: url('".$themefolder."/img/patterns/pat_07.png');";
			break;
			case 'pattern_8':
				return "background-image: url('".$themefolder."/img/patterns/pat_08.png');";
			break;
			case 'pattern_9':
				return "background-image: url('".$themefolder."/img/patterns/pat_09.png');";
			break;
			case 'pattern_10':
				return "background-image: url('".$themefolder."/img/patterns/pat_10.png');";
			break;

		}
	}	
	
/**
 * Footer Setting functions.
 *
 */	

	function mpt_footer_widget_setting_1() {
		$selected = get_option('mpt_footer_widget_setting');
		if($selected == 'widget633') {
				echo '6';
		} elseif ($selected == 'widget336') {
				echo '3';
		} else {
				echo '4';
		}
	}
	
	function mpt_footer_widget_setting_2() {
		$selected = get_option('mpt_footer_widget_setting');
		if($selected == 'widget633') {
				echo '3';
		} elseif ($selected == 'widget336') {
				echo '3';
		} else {
				echo '4';
		}
	}
	
	function mpt_footer_widget_setting_3() {
		$selected = get_option('mpt_footer_widget_setting');
		if($selected == 'widget633') {
				echo '3';
		} elseif ($selected == 'widget336') {
				echo '6';
		} else {
				echo '4';
		}
	}


/**
 * Social Icon functions.
 *
 */	

	//show facebook icon
	function mpt_show_fb_icon() {
		$fburl = esc_url(get_option('mpt_fb_link'));
		$selected = get_option('mpt_enable_fb_icon');
		$themefolder = get_template_directory_uri();
		if($selected == 'true') {
			if(!empty($fburl)) {
				echo '<li><a href="'.$fburl.'" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-fb.png" width="24" height="24" title="Facebook"></a></li>';
			 } else {
				echo '<li><a href="http://www.facebook.com" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-fb.png" width="24" height="24" title="Facebook"></a></li>';
			}
		} else {
				echo '';
			}
	}

	//show twitter icon
	function mpt_show_twit_icon() {
		$twiturl = esc_url(get_option('mpt_twitter_link'));
		$selected = get_option('mpt_enable_twitter_icon');
		$themefolder = get_template_directory_uri();
		if($selected == 'true') {
			if(!empty($twiturl)) {
				echo '<li><a href="'.$twiturl.'" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-twit.png" width="24" height="24" title="Twitter"></a></li>';
			 } else {
				echo '<li><a href="http://www.twitter.com" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-twit.png" width="24" height="24" title="Twitter"></a></li>';
			}
		} else {
				echo '';
			}
	}

	//show Google+ icon
	function mpt_show_gplus_icon() {
		$gplusurl = esc_url(get_option('mpt_gplus_link'));
		$selected = get_option('mpt_enable_gplus_icon');
		$themefolder = get_template_directory_uri();
		if($selected == 'true') {
			if(!empty($gplusurl)) {
				echo '<li><a href="'.$gplusurl.'" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-gplus.png" width="24" height="24" title="Google+"></a></li>';
			 } else {
				echo '<li><a href="http://plus.google.com" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-gplus.png" width="24" height="24" title="Google+"></a></li>';
			}
		} else {
				echo '';
			}
	}
	 
	//show Dribbble icon
	function mpt_show_dribbble_icon() {
		$dribbbleurl = esc_url(get_option('mpt_dribbble_link'));
		$selected = get_option('mpt_enable_dribbble_icon');
		$themefolder = get_template_directory_uri();
		if($selected == 'true') {
			if(!empty($dribbbleurl)) {
				echo '<li><a href="'.$dribbbleurl.'" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-dribbble.png" width="24" height="24" title="Dribble"></a></li>';
			 } else {
				echo '<li><a href="http://dribbble.com" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-dribbble.png" width="24" height="24" title="Dribble"></a></li>';
			}
		} else {
				echo '';
			}
	}

	//show Vimeo icon
	function mpt_show_vimeo_icon() {
		$vimeourl = esc_url(get_option('mpt_vimeo_link'));
		$selected = get_option('mpt_enable_vimeo_icon');
		$themefolder = get_template_directory_uri();
		if($selected == 'true') {
			if(!empty($vimeourl)) {
				echo '<li><a href="'.$vimeourl.'" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-vimeo.png" width="24" height="24" title="Vimeo"></a></li>';
			 } else {
				echo '<li><a href="http://vimeo.com" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-vimeo.png" width="24" height="24" title="Vimeo"></a></li>';
			}
		} else {
				echo '';
			}
	}


	//show rss icon
	function mpt_show_rss_icon() {
		$rssurl = esc_url(get_option('mpt_rss_link'));
		$selected = get_option('mpt_enable_rss_icon');
		$themefolder = get_template_directory_uri();
		$blogrss = get_bloginfo('rss_url');
		if($selected == 'true') {
			if(!empty($rssurl)) {
				echo '<li><a href="'.$rssurl.'" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-rss.png" width="24" height="24" title="RSS"></a></li>';
			 } else {
				echo '<li><a href="'.$blogrss.'" target="_blank"><img src="'.$themefolder.'/img/icon/24/social-icon-circle-rss.png" width="24" height="24" title="RSS"></a></li>';
			}
		} else {
				echo '';
			}
	}

	
/**
 * SEO functions.
 *
 */	
	//load site title
	function mpt_load_site_title() {
		$customtitle = esc_attr(get_option('mpt_cus_title'));
		$selected = get_option('mpt_enable_custom_title');
		$blogtitle = esc_attr(get_bloginfo('name'));
		if($selected == 'true') {
			if(!empty($customtitle)) {
				echo $customtitle;
			 } else {
				echo $blogtitle;
			}
		} else {
				echo $blogtitle;
			}
	}
	
	//load meta description
	function mpt_load_meta_desc() {
		$metadesc = esc_attr(get_option('mpt_cus_meta_desc'));
		$selected = get_option('mpt_enable_meta_desc');
		$blogdesc = esc_attr(get_bloginfo('description'));
		if($selected == 'true') {
			if(!empty($metadesc)) {
				echo $metadesc;
			 } else {
				echo $blogdesc;
			}
		} else {
				echo $blogdesc;
			}
	}

	//load meta keywords
	function mpt_load_meta_keywords() {
		$metakey = esc_attr(get_option('mpt_cus_meta_keywords'));
		$selected = get_option('mpt_enable_meta_keywords');
		if($selected == 'true') {
			if(!empty($metakey)) {
				echo $metakey;
			 } else {
				echo '';
			}
		} else {
				echo '';
			}
	}

/**
 * Code Integration function.
 *
 */
	function mpt_load_header_code() {
		$headercode = get_option('mpt_header_code');
		$selected = get_option('mpt_enable_header_code');
		if($selected == 'true') {
			if(!empty($headercode)) {
				echo $headercode;
			 }
		}
	}

	function mpt_load_body_code() {
		$bodycode = get_option('mpt_body_code');
		$selected = get_option('mpt_enable_body_code');
		if($selected == 'true') {
			if(!empty($bodycode)) {
				echo $bodycode;
			 }
		}
	}
	
	function mpt_load_top_code() {
		$topcode = get_option('mpt_top_code');
		$selected = get_option('mpt_enable_top_code');
		if($selected == 'true') {
			if(!empty($topcode)) {
				echo $topcode.'<div class="clear padding10"></div>';
			 }
		}
	}
	
	function mpt_load_bottom_code() {
		$bottomcode = get_option('mpt_bottom_code');
		$selected = get_option('mpt_enable_bottom_code');
		if($selected == 'true') {
			if(!empty($bottomcode)) {
				echo $bottomcode.'<div class="clear padding10"></div>';
			 }
		}
	}

/**
 * Post Functions.
 *
 */

	function mpt_load_featured_image( $id , $imagesize = 'tb-360' , $prettyphoto = false) {
		$output = '';
		$fullimage = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full');


		if ($imagesize == 'tb-860') {
			$style = ' style="max-width: 860px;"';
		} else {
			$style = '';
		}

		$output .= '<div class="image-box transparent"'.$style.'>';
		if ($prettyphoto == 'true') {
			$output .= '<a href="'.$fullimage[0].'" rel="prettyPhoto[post-'.$id.']">';
			$hover = array('id' => 'nav3-'.$id , 'alt' => '');
		} else {
			$output .= '<a href="'.get_permalink($id).'">';
			$hover = array('id' => 'nav1-'.$id , 'alt' => '');
		}
		$output .= get_the_post_thumbnail($id,$imagesize,$hover);
		$output .= '</a>';
		$output .= '</div>';

		if ($prettyphoto == 'true') {
			$output .= '<script type="text/javascript">';
			$output .= 'jQuery(document).ready(function () {';
			$output .= 'jQuery("#nav3-'.$id.'").HoverAlls({bg_class:"navbg3",end_opacity:.85,speed_in:1500, bg_height:"100%",effect_in:"easeOutElastic",bg_width:"100%",text_start_opacity:0,text_end_opacity:1,text_speed_in:1200,text_speed_out:250,text_effect_in:"easeOutBack",text_class:"navtext3",starts:"300px,52px",ends:"8px,12px",returns:"300px,52px",text_starts:"100%,100%",text_ends:"0%,50%",text_returns:"100%,100%"});';
			$output .= '});';
			$output .= '</script>';
		} else {
			$output .= '<script type="text/javascript">';
			$output .= 'jQuery(document).ready(function () {';
			$output .= 'jQuery("#nav1-'.$id.'").HoverAlls({starts:"0px,0px",ends:"25%,25%",returns:"0px,0px",bg_class:"navbg1",effect_in:"easeOutElastic",speed_in:1500,bg_height:"100%",bg_width:"100%",text_starts:"0px,100%",text_ends:"0px,0px",text_returns:"0px,100%",text_start_opacity:0,text_end_opacity:1,text_speed_in:650,text_speed_out:450,text_class:"navtext"});';
			$output .= '});';
			$output .= '</script>';		
		}
		
		echo $output;
	}

	function mpt_load_image_carousel( $id , $imagesize = 'tb-360' , $prettyphoto = false) {
		$themefolder = get_template_directory_uri();
		$output = '';
		$image1 = get_post_meta( $id, '_mpt_video_featured_image_2', true );
		$imageurl1 = esc_url($image1);
		$attachid1 = get_image_id($imageurl1);
		$image2 = get_post_meta( $id, '_mpt_video_featured_image_3', true );
		$imageurl2 = esc_url($image2);
		$attachid2 = get_image_id($imageurl2);
		$fullimage = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full');

		if ($imagesize == 'tb-860') {
			$style = ' style="max-width: 860px;"';
		} else {
			$style = '';
		}

		$output .= '<div id="image-carousel-'.$id.'" class="image-carousel carousel slide"'.$style.'>';
		$output .= '<div class="carousel-inner">';
		$output .= '<div class="active item">';

		if ($prettyphoto == 'true') {
			$output .= '<a href="'.$fullimage[0].'" rel="prettyPhoto[carousel-'.$id.']">';
		} else {
			$output .= '<a href="'.get_permalink($id).'">';
		}

		$output .= get_the_post_thumbnail($id,$imagesize);
		$output .= '</a></div>';
		$output .= '<div class="item">';

		if ($prettyphoto == 'true') {
			$output .= '<a href="'.$imageurl1.'" rel="prettyPhoto[carousel-'.$id.']">';
		} else {
			$output .= '<a href="'.get_permalink($id).'">';
		}

		$output .= wp_get_attachment_image( $attachid1, $imagesize );
		$output .= '</a></div>';
		$output .= '<div class="item">';

		if ($prettyphoto == 'true') {
			$output .= '<a href="'.$imageurl2.'" rel="prettyPhoto[carousel-'.$id.']">';
		} else {
			$output .= '<a href="'.get_permalink($id).'">';
		}

		$output .= wp_get_attachment_image( $attachid2, $imagesize );
		$output .= '</a></div>';
		$output .= '</div>';
		$output .= '<a class="carousel-control left" href="#image-carousel-'.$id.'" data-slide="prev"><img src="'.$themefolder.'/img/back.png"></a>';
		$output .= '<a class="carousel-control right" href="#image-carousel-'.$id.'" data-slide="next"><img src="'.$themefolder.'/img/next.png"></a>';
		$output .= '</div>';
		$output .= '<script type="text/javascript">';
		$output .= 'jQuery(document).ready(function () {jQuery("#image-carousel-'.$id.'").carousel({interval: 3000,pause: "hover"})});';
		$output .= '</script>';
		
		echo $output;
	}

	function get_image_id($image_url) {
	    global $wpdb;
	    $prefix = $wpdb->prefix;
	    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='" . $image_url . "';"));
	    return $attachment[0];
	}

	function mpt_load_video_post( $id , $height = null) {
		$output = '';
		$video = get_post_meta( $id, '_mpt_post_video_url', true );
		$videourl = esc_url($video);
		$videotype = get_post_meta( $id, '_mpt_post_video_type', true );
		$videocode = '';

		if (!empty($height)) {
			$videoheight = ' height="'.$height.'"';
		} else {
			$videoheight = '';
		}

		switch ($videotype) {
			case 'youtube':
				$youtube = array(
					"http://youtu.be/",
					"http://www.youtube.com/watch?v=",
					"http://www.youtube.com/embed/"
					);
				$videonum = str_replace($youtube, "", $videourl);
				$videocode = 'http://www.youtube.com/embed/' . $videonum;
				break;
			case 'vimeo':
				$vimeo = array(
					"http://vimeo.com/",
					"http://player.vimeo.com/video/"
					);
				$videonum = str_replace($vimeo, "", $videourl);
				$videocode = 'http://player.vimeo.com/video/' . $videonum;
				break;
		}

		$output .= '<div class="video-box">';
		$output .= '<iframe src="'.$videocode.'?title=1&amp;byline=1&amp;portrait=1" width="100%"'.$videoheight.' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		$output .= '</div>';
		
		echo $output;
	}


?>