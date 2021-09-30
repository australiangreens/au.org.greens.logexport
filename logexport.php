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

  if (isset(Civi::$statics[__FUNCTION__])) { return; }
  Civi::$statics[__FUNCTION__] = 1;

  // Run with a high priority, to run before other export hooks which may halt execution
  Civi::dispatcher()->addListener('hook_civicrm_export', '_logexport_civicrm_export', 500);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function logexport_civicrm_xmlMenu(&$files) {
  _logexport_civix_civicrm_xmlMenu($files);
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
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function logexport_civicrm_postInstall() {
  _logexport_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function logexport_civicrm_uninstall() {
  _logexport_civix_civicrm_uninstall();
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
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function logexport_civicrm_disable() {
  _logexport_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function logexport_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _logexport_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function logexport_civicrm_managed(&$entities) {
  _logexport_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function logexport_civicrm_caseTypes(&$caseTypes) {
  _logexport_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function logexport_civicrm_angularModules(&$angularModules) {
  _logexport_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function logexport_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _logexport_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function logexport_civicrm_entityTypes(&$entityTypes) {
  _logexport_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_export() using Symfony hooks.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_export/
 */
function _logexport_civicrm_export($event) {
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
  $printExportMode = $exportTypes[$event->exportMode];
  $printHeaderRows = json_encode($event->headerRows);
  $printIds = json_encode($event->ids);
  $fileName->log("User {$form->getLoggedInUserContactID()} Just did an export of type {$printExportMode} with the following Header Rows {$printHeaderRows} involving the following IDs {$printIds}");
}
