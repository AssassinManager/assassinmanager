<?php
/**
 * @file
 * player.features.inc
 */

/**
 * Implements hook_node_info().
 */
function player_node_info() {
  $items = array(
    'profile' => array(
      'name' => t('Profile'),
      'base' => 'node_content',
      'description' => t('Automatically created and updated profile
node path = base_url/user-uid'),
      'has_title' => '1',
      'title_label' => t('User'),
      'help' => '',
    ),
  );
  return $items;
}
