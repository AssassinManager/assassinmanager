<?php

function player_profile_form_user_profile_form_alter(&$form, &$form_state, $form_id) {
  $form['terms_of_use'] = array(
    '#type' => 'checkbox', 
    '#title' => t("I agree with the website's terms and conditions."), 
    '#required' => TRUE,
  );
}