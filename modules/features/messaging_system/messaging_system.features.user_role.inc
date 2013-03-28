<?php
/**
 * @file
 * messaging_system.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function messaging_system_user_default_roles() {
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
