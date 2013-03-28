<?php
/**
 * @file
 * game_content.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function game_content_user_default_roles() {
  $roles = array();

  // Exported role: Organizer.
  $roles['Organizer'] = array(
    'name' => 'Organizer',
    'weight' => '4',
  );

  // Exported role: Player.
  $roles['Player'] = array(
    'name' => 'Player',
    'weight' => '3',
  );

  return $roles;
}
