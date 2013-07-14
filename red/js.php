	<!-- Load JS -->
	<script type="text/javascript">
	
	jQuery(document).ready(function () {
		// Load Hoverall JS
		jQuery('#nav1').HoverAlls({starts:"0px,0px",ends:"25%,25%",returns:"0px,0px",bg_class:"navbg1",effect_in:"easeOutElastic",speed_in:1500,bg_height:"100%",bg_width:"100%",text_starts:"0px,100%",text_ends:"0px,0px",text_returns:"0px,100%",text_start_opacity:0,text_end_opacity:1,text_speed_in:650,text_speed_out:450,text_class:"navtext"});
		jQuery('#nav2').HoverAlls({starts:"-230px,215px",ends:"-10px,10px",returns:"-230px,215px",bg_class:"navbg2",end_opacity:1,speed_in:1500, speed_out:125, text_class:"cap1text", bg_height:"215px",bg_width:"230px",effect_in:"easeOutElastic"});
		jQuery('#nav3').HoverAlls({bg_class:"navbg3",end_opacity:.85,speed_in:1500, bg_height:"100%",effect_in:"easeOutElastic",bg_width:"100%",text_start_opacity:0,text_end_opacity:1,text_speed_in:1200,text_speed_out:250,text_effect_in:"easeOutBack",text_class:"navtext3",starts:"300px,52px",ends:"8px,12px",returns:"300px,52px",text_starts:"100%,100%",text_ends:"0%,50%",text_returns:"100%,100%"});
		jQuery('#nav4').HoverAlls({starts:"0px,0px",ends:"0px,0px",returns:"0px,0px",bg_class:"navbg4",end_opacity:.95,speed_in:750, text_class:"cap1text", bg_height:"215px", text_class:"navtext4",text_starts:"100px,330px",text_ends:"100px,185px",text_returns:"100px,185px",text_start_opacity:1,text_end_opacity:1,text_speed_in:1200,text_speed_out:450,text_effect_in:"easeOutQuint",passthrough:true});
	
		// prettyPhoto
    	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
    		social_tools: false
    	});

    	// tooltip
    	jQuery('.tool-tip').tooltip();
	});

	</script>