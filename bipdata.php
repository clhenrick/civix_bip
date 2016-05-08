<?php

require_once 'bipdata.civix.php';

/**
 * See if a CiviCRM custom field group exists
 *
 * @param string $group_name
 *   custom field group name to look for, corresponds to field civicrm_custom_group.name
 * @return integer
 *   custom field group id if it exists, else zero
 */
function custom_group_get_id($group_name) {
  $result = 0;

  // This is an empty array we pass in to make the retrieve() function happy
  $def = array();
  $params = array(
    'name' => $group_name,
  );

  require_once('CRM/Core/BAO/CustomGroup.php');

  $custom_group = CRM_Core_BAO_CustomGroup::retrieve($params, $def);

  if (!empty($custom_group)) {
    $result = $custom_group->id;
  }
  return $result;
}
/**
 * See if a CiviCRM custom field exists
 *
 * @param integer $custom_group_id
 *   custom group id that the field is expected to belong to
 * @param string $field_label
 *   custom field name to look for, corresponds to field civicrm_custom_field.label
 * @return integer
 *   custom field id if it exists, else zero
 */
function custom_field_get_id($custom_group_id, $field_label) {
  $result = 0;

  // This is an empty array we pass in to make the retrieve() function happy
  $def = array();
  $params = array(
    'custom_group_id' => $custom_group_id,
    'label'           => $field_label,
  );

  require_once('CRM/Core/BAO/CustomField.php');

  $custom_field = CRM_Core_BAO_CustomField::retrieve($params, $def);

  if (!empty($custom_field)) {
    $result = $custom_field->id;
  }
  return $result;
}

function bipdata_civicrm_pre($op, $objectName, $id, &$params) {
  // This hook fires all the time, only run this code if we're creating/editing an address
  if ($objectName == 'Address' && ($op == 'create' || $op == 'edit')) {
    // Does this address have a BBL?
    $custom_field_label = 'BBL';
    $group_id = custom_group_get_id($custom_field_label);
    $field_id = custom_field_get_id($group_id, $custom_field_label);
    $custom_field = 'bbl_' . $field_id;

    if ($custom_field !== null) {
      // Write some code to get the BIP values from someplace else.  Could be an API call or a SQL call or whatever.
      // Example using API (assumes BIP data is its own object)
      $result = civicrm_api3('BipData', 'get', array(
        'bip_bbl' => $params[$custom_field]
      ));
      echo($result);
    }
  }
}

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
