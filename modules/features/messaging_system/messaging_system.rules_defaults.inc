<?php
/**
 * @file
 * messaging_system.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function messaging_system_default_rules_configuration() {
  $items = array();
  $items['rules_user_message_send_email'] = entity_import('rules_config', '{ "rules_user_message_send_email" : {
      "LABEL" : "User message send email",
      "PLUGIN" : "reaction rule",
      "TAGS" : [ "user message" ],
      "REQUIRES" : [ "rules" ],
      "ON" : [ "node_insert" ],
      "IF" : [
        { "node_is_of_type" : { "node" : [ "node" ], "type" : { "value" : { "message" : "message" } } } },
        { "AND" : [] },
        { "data_is" : { "data" : [ "node:field-send-email" ], "value" : 1 } }
      ],
      "DO" : [
        { "mail" : {
            "to" : "[node:field_recipient_s_]",
            "subject" : "[node:title]",
            "message" : "[node:field-body]",
            "from" : "[site:current-user]",
            "language" : [ "" ]
          }
        }
      ]
    }
  }');
  $items['rules_user_message_send_sms'] = entity_import('rules_config', '{ "rules_user_message_send_sms" : {
      "LABEL" : "User message send SMS",
      "PLUGIN" : "reaction rule",
      "TAGS" : [ "user message" ],
      "REQUIRES" : [ "rules", "twilio_sms" ],
      "ON" : [ "node_insert" ],
      "IF" : [
        { "node_is_of_type" : { "node" : [ "node" ], "type" : { "value" : { "message" : "message" } } } },
        { "AND" : [] },
        { "data_is" : { "data" : [ "node:field-send-sms" ], "value" : 1 } }
      ],
      "DO" : [
        { "twilio_sms_action_send_sms" : {
            "user" : [ "node:field-recipient-s-:0" ],
            "message" : "[node:field-message:value]"
          }
        }
      ]
    }
  }');
  return $items;
}
