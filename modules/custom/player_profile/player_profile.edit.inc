<?php

// implements hook_form_user_profile_form_alter
function player_profile_form_user_profile_form_alter(&$form, &$form_state, $form_id) {
    global $user;

    if(in_array("administrator", $user->roles)) return;

    if(in_array("Organizer", $user->roles)){
        unset($form['account']);

        unset($form['field_first_name']);
        unset($form['field_last_name']);
        unset($form['field_cell_phone']);
        unset($form['field_about_me']);

        unset($form['field_license_code']);
        unset($form['field_player_rank']);

        unset($form['ckeditor']);
    } else {
        unset($form['account']['name']);
        unset($form['account']['roles']);
        unset($form['account']['status']);
        unset($form['account']['notify']);
         
        unset($form['field_suspended']);
        unset($form['field_license_code']);
        unset($form['field_alive']);
        unset($form['field_current_target']);
        unset($form['field_pending_target']);
        unset($form['field_killed_targets']);
        unset($form['field_player_rank']);

        unset($form['ckeditor']);
    }
}