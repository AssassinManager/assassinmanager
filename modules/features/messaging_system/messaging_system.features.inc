<?php
/**
 * @file
 * messaging_system.features.inc
 */

/**
 * Implements hook_views_api().
 */
function messaging_system_views_api() {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function messaging_system_node_info() {
  $items = array(
    'message' => array(
      'name' => t('Message'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Subject'),
      'help' => '',
    ),
  );
  return $items;
}
