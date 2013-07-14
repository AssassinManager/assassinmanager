<?php
/** Revolution Slider block **/
class AQ_Revslider_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Revolution Slider',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_revslider_block', $block_options);
	}
	
	function form($instance) {
		
		$slider = new RevSlider();
    	$arrSliders = $slider->getArrSlidersShort();
    	
    	$sliderID = UniteFunctionsRev::getVal($instance, "rev_slider");
    	
		if(empty($arrSliders))
			echo __("No sliders found, Please create a slider");
		else{
			$field = "rev_slider";
			$fieldID = $this->get_field_id( $field );
			$fieldName = $this->get_field_name( $field );

			$select = UniteFunctionsRev::getHTMLSelect($arrSliders,$sliderID,'name="'.$fieldName.'" id="'.$fieldID.'"',true);
		}
		echo "Choose slider: ";
		echo $select;
	}
	
	function block($instance) {
		$sliderID = $instance["rev_slider"];
		if(empty($sliderID))
			return(false);
			
		RevSliderOutput::putSlider($sliderID);
	}

    function update($new_instance, $old_instance) {
    	
        return($new_instance);
    }
	
}
