<?php

require_once 'bipdata.civix.php';

/**
 * See if a CiviCRM custom field exists
 * @param string $name
 *   custom field name to look for, corresponds to field civicrm_custom_field.name
 * @return custom id
 *   custom field id if it exists, else zero
 */
function bipdata_custom_field_get_id($name) {
  $result = civicrm_api3('CustomField', 'getvalue', array(
    'return' => "id",
    'name' => $name,
  ));
  return $result;
}

function bipdata_get_bip_custom_groups() {
  $result = civicrm_api3('CustomGroup', 'get', array(
    'sequential' => 1,
    'return' => array("name"),
  ));
  foreach ($result['values'] as $group) {
    if (strpos($group['name'], "Bip_") !== FALSE) {
      $bipGroups[] = $group['name'];
    }
  }
  return $bipGroups;
}

function bipdata_get_bip_custom_fields() {
  $bipCustomGroups = bipdata_get_bip_custom_groups();
  CRM_Core_Error::debug_var('bipCustomGroups', $bipCustomGroups);
  $result = civicrm_api3('CustomField', 'get', array(
    'return' => array("id", "name", "data_type"),
    'custom_group_id' => array('IN' => array("Bip_Data", "Bip_Data_Violations", "Bip_Data_Scores", "Bip_Data_Management")),
    'options' => array('limit' => 0),
  ));
  return $result['values'];
}
function bipdata_civicrm_pre($op, $objectName, $id, &$params) {
  // When saving an address, check for a BBL.  If a BBL is present,
  // do a lookup with that BBL against the BipData entity.  Fill in the
  // address custom fields based on the lookup.
  if ($objectName == 'Address' && ($op == 'create' || $op == 'edit')) {
    // Check if a BBL exists on this address.
    $bblFieldId = bipdata_custom_field_get_id('BBL');
    $bbl = CRM_Utils_Array::value("custom_$bblFieldId", $params);
    if (!$bbl) {
      return;
    }

    // BBL exists, let's do a lookup.
    $result = civicrm_api3('BipData', 'get', array(
      'sequential' => 1,
      'bip_bbl' => $bbl,
    ));
    // Make sure the lookup returns a result - not all buildings are in the dataset.
    if ($result['count'] !== 1) {
      return;
    }

    // OK, we've got a match.
    $bipData = $result['values'][0];
    // Let's get an array of all the relevant custom field values.
    $bipCustomFields = bipdata_get_bip_custom_fields();

    // Let's match up lookup data to custom fields.
    // But not "id", that's not copied to a custom field.
    unset($bipData['id']);

    // Loop through the lookup data.
    foreach ($bipData as $k => $v) {
      // Find the corresponding custom field.
      foreach ($bipCustomFields as $id => $bipFieldMetadata) {
        if ($bipFieldMetadata['name'] == $k) {
          $fieldId = $id;
          break;
        }
      }
      // Put the lookup data into the custom field.
      $params["custom_$fieldId"] = $v;
    }
    CRM_Core_Error::debug_var('params', $params);
  }
}

/*
function bipdata_civicrm_pre($op, $objectName, $id, &$params) {
  // This hook fires all the time, only run this code if we're creating/editing an address
  if ($objectName == 'Address' && $op == 'edit') {

      if (!empty($response['values'])) {
        foreach ($response['values'] as $key => $result) {
          $set_params = array('entity_id' => $id);

          $document_type = custom_field_get_id('document_type');
          $set_params['custom_' . $document_type] = $result['document_type'];

          $recorded_filed = custom_field_get_id('recorded_filed');
          $recorded_filed_date = new DateTime($result['recorded_filed']);
          $stripped_recorded_filed = $recorded_filed_date->format('YmdHis');
          $set_params['custom_' . $recorded_filed] = $stripped_recorded_filed;

          $absolute = custom_field_get_id('absolute');
          $set_params['custom_' . $absolute] = $result['absolute'];

*/
/**
 * Implements hook_civicrm_entityTypes.
 *
 * @param array $entityTypes
 *   Registered entity types.
 */
function bipdata_civicrm_entityTypes(&$entityTypes) {
  $entityTypes[] = array(
    'name' => 'BipData',
    'class' => 'CRM_BipData_DAO_BipData',
    'table' => 'civicrm_bipdata',
  );
}
/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function bipdata_civicrm_config(&$config) {
  _bipdata_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function bipdata_civicrm_xmlMenu(&$files) {
  _bipdata_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function bipdata_civicrm_install() {
  _bipdata_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function bipdata_civicrm_uninstall() {
  _bipdata_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function bipdata_civicrm_enable() {
  _bipdata_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function bipdata_civicrm_disable() {
  _bipdata_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function bipdata_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _bipdata_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function bipdata_civicrm_managed(&$entities) {
  _bipdata_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function bipdata_civicrm_caseTypes(&$caseTypes) {
  _bipdata_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function bipdata_civicrm_angularModules(&$angularModules) {
_bipdata_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function bipdata_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _bipdata_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function bipdata_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function bipdata_civicrm_navigationMenu(&$menu) {
  _bipdata_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'unhp.bipdata')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _bipdata_civix_navigationMenu($menu);
} // */
