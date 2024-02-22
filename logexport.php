<?php

require_once 'logexport.civix.php';
use CRM_Logexport_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function logexport_civicrm_config(&$config) {
  _logexport_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function logexport_civicrm_install() {
  _logexport_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function logexport_civicrm_enable() {
  _logexport_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_export().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_export/
 */
function logexport_civicrm_export(&$exportTempTable, &$headerRows, &$sqlColumns, &$exportMode, &$componentTable, &$ids) {
  $form = new CRM_Core_Form();
  $fileName = CRM_Core_Error::createDebugLogger('Export_Log');
  $exportTypes = [
    1 => 'Contact',
    2 => 'Contribute',
    3 => 'Membership',
    4 => 'Event',
    5 => 'Pledge',
    6 => 'Case',
    7 => 'Grant',
    8 => 'Activity',
  ];
  $printExportMode = $exportTypes[$exportMode];
  $printHeaderRows = json_encode($headerRows);
  $printIds = json_encode($ids);
  $fileName->log("User {$form->getLoggedInUserContactID()} Just did an export of type {$printExportMode} with the following Header Rows {$printHeaderRows} involving the following IDs {$printIds}");
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *

 // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function logexport_civicrm_navigationMenu(&$menu) {
  _logexport_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _logexport_civix_navigationMenu($menu);
} // */
