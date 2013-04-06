<?php
/**
 * @file
 * prizes_system.features.inc
 */

/**
 * Implements hook_views_api().
 */
function prizes_system_views_api() {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function prizes_system_node_info() {
  $items = array(
    'prize' => array(
      'name' => t('Prize'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
