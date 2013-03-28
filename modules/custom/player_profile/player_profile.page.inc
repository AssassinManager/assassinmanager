<?php

define("dead", 0);
define("pending_death", 1);
define("no_target", 2);
define("suspended", 3);
define("good", 4);

// create targetting table and populate it
function create_targetting_table() {
    $current_target = array();
    $pending_target = array();
    $killed_targets = get_killed_targets();

    // test if the user is suspended
    if (player_status() != suspended) {
        $current_target = array(get_current_target());
        $pending_target = array(get_pending_target());
    }

    // create table
    $headers = array(
        'current' => t('current target'),
        'pending' => t('pending kill confirmation'),
        'killed' => t('killed targets'),
    );

    $rows = populate_targetting_table($current_target,$pending_target,$killed_targets);

    $form_targets['table'] = array(
        '#theme' => 'table',
        '#header' => $headers,
        '#rows' => $rows,
        '#empty' => t('no users found'),
    );
    return $form_targets;
}
function populate_targetting_table($current_target, $pending_target, $killed_targets) {
    $cols['current'] = $current_target;
    $cols['pending'] = $pending_target;
    $cols['killed'] = $killed_targets;

    $max_rows = count($cols['current']);

    if ($max_rows < count($cols['pending'])) $max_rows = count($cols['pending']);
    if ($max_rows < count($cols['killed']))  $max_rows = count($cols['killed']);

    $must_balance = true;
    while ($must_balance) {
        if (count($cols['current']) < $max_rows) array_push($cols['current'], '');
        if (count($cols['pending']) < $max_rows) array_push($cols['pending'], '');
        if (count($cols['killed']) < $max_rows)  array_push($cols['killed'], '');

        if (count($cols['current']) == $max_rows &&
            count($cols['pending']) == $max_rows &&
            count($cols['killed']) == $max_rows) {
            $must_balance = false;
        }
    }

    $rows = array();
    for($counter=0; $counter<$max_rows; $counter++) {
        $new_row = array (  
                            'current' => $cols['current'][$counter],
                            'pending' => $cols['pending'][$counter],
                            'killed' => $cols['killed'][$counter],
                        );
        array_push($rows, $new_row);
    }

    return $rows;
}

// create customized buttons row depending on viewing user
function create_buttons_row() {
    $button_row = array();
    global $user;
    $status = player_status();

    if (in_array('organizer', $user->roles)) {
        if ($status == suspended) // check if user is already suspended
             $button_row['player_suspend'] = get_suspend_player_button(true);
        else $button_row['player_suspend'] = get_suspend_player_button(false);

    } else {
    	if ($status == suspended) {
    		$button_row['target_killed'] = get_killed_target_button(true);

    	} else if ($status == dead) {
    		$button_row['target_killed'] = get_killed_target_button(true);

    	} else if ($status == pending_death) {
    		$button_row['target_killed'] = get_killed_target_button(true);
    		$button_row['accept_death'] = get_player_death_button(true);
    		$button_row['deny_death'] = get_player_death_button(false);
    	} else {
    		$button_row['target_killed'] = get_killed_target_button(false);
    	}
    }
    return $button_row;
}
function get_suspend_player_button($disabled) {
	return array(
                '#type' => 'button',
                '#disabled' => $disabled,
                '#name' => 'player_suspend',
                '#value' => t('suspend'),
                '#button_type' => 'submit',
                '#executes_submit_callback' => true,
                '#submit' => array('suspend_player'),
            );
}
function get_killed_target_button($disabled) {
	return array(
                '#type' => 'button',
                '#disabled' => $disabled,
                '#name' => 'Target_killed',
                '#value' => t('target eliminated'),
                '#button_type' => 'submit',
                '#executes_submit_callback' => true,
                '#submit' => array('target_killed'),
            );
}
function get_player_death_button($accept) {
	if ($accept)
		return array(
            '#type' => 'button', 
            '#name' => 'accept_kill',
            '#value' => t('Yes I was killed'),
            '#button_type' => 'submit',
            '#executes_submit_callback' => true,
            '#submit' => array('accept_death'),
        );

    return array(
        '#type' => 'button', 
        '#name' => 'deny_kill',
        '#value' => t('No! I was not killed'),
        '#button_type' => 'submit',
        '#executes_submit_callback' => true,
        '#submit' => array('deny_death'),
    );
}