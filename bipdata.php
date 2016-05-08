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
        'bip_bbl' => $params['custom_153']
      ));
      $params['bip_address_270'] == $result['address'];
      $params['res_unit_154'] == $result['res_unit'];
      $params['tot_unit_155'] == $result['tot_unit'];
      $params['num_floors_156'] == $result['num_floors'];
      $params['census_tract_157'] == $result['census_tract'];
      $params['borocode_159'] == $result['borocode'];
      $params['block_160'] == $result['block'];
      $params['lot_161'] == $result['lot'];
      $params['commdist_162'] == $result['commdist'];
      $params['lucategory_163'] == $result['lucategory'];
      $params['year_built_164'] == $result['year_built'];
      $params['yr_1st_alt_165'] == $result['yr_1st_alt'];
      $params['yr_2nd_alt_166'] == $result['yr_2nd_alt'];
      $params['bldg_class_167'] == $result['bldg_class'];
      $params['zoning_gen_168'] == $result['zoning_gen'];
      $params['zoning_169'] == $result['zoning'];
      $params['open_violations_171'] == $result['open_violations'];
      $params['open_a_violations_172'] == $result['open_a_violations'];
      $params['open_b_violations_173'] == $result['open_b_violations'];
      $params['open_c_violations_174'] == $result['open_c_violations'];
      $params['prioryear_violations_175'] == $result['prioryear_violations'];
      $params['prioryear_a_violations_176'] == $result['prioryear_a_violations'];
      $params['prioryear_b_violations_177'] == $result['prioryear_b_violations'];
      $params['prioryear_c_violations_178'] == $result['prioryear_c_violations'];
      $params['seven_a_179'] == $result['seven_a'];
      $params['aep_180'] == $result['aep'];
      $params['ppi_181'] == $result['ppi'];
      $params['underlying_conditions_182'] == $result['underlying_conditions'];
      $params['nyc_421a_exempt_properties_183'] == $result['nyc_421a_exempt_properties'];
      $params['dob_violation_186'] == $result['dob_violation'];
      $params['ecb_violation_187'] == $result['ecb_violation'];
      $params['city_lien_188'] == $result['city_lien'];

      $params['water_190'] == $result['water'];
      $params['umbrella_192'] == $result['umbrella'];
      $params['party_name_193'] == $result['party_name'];
      $params['document_type_194'] == $result['document_type'];
      $params['recorded_filed_196'] == $result['recorded_filed'];
      $params['absolute_197'] == $result['absolute'];
      $params['per_unit_198'] == $result['per_unit'];
      $params['current_bip_score_199'] == $result['current_bip_score'];
      $params['score_2015april_200'] == $result['score_2015april'];
      $params['score_2015jan_201'] == $result['score_2015jan'];
      $params['score_2014oct_202'] == $result['score_2014oct'];
      $params['score_2014jun_203'] == $result['score_2014jun'];
      $params['score_2014feb_204'] == $result['score_2014feb'];
      $params['score_2013nov_205'] == $result['score_2013nov'];
      $params['score_2013aug_206'] == $result['score_2013aug'];
      $params['score_2013april_207'] == $result['score_2013april'];
      $params['score_2012nov_208'] == $result['score_2012nov'];
      $params['score_2012june_209'] == $params['score_2012june'];
      $params['score_2012jan_210'] == $params['score_2012jan'];
      $params['score_2010_2_211'] == $params['score_2010_2'];
      $params['score_2010_1_212'] == $params['score_2010_1'];
      $params['score_2009_2_213'] == $params['score_2009_2'];
      $params['score_2009_1_214'] == $params['score_2009_1'];
      $params['score_2008_2_215'] == $params['score_2008_2'];
      $params['occurance_216'] == $result['occurance'];
      $params['average_217'] == $result['average'];
      $params['cdfavg_218'] == $result['cdfavg'];
      $params['corpname_219'] == $result['corpname'];
      $params['corpstreet_221'] == $result['corpstreet'];
      $params['corpapt_222'] == $result['corpapt'];
      $params['corpcity_223'] == $result['corpcity'];
      $params['corpstate_224'] == $result['corpstate'];

      $params['indivfirstname_226'] == $result['indivfirstname'];
      $params['indivlastname_227'] == $result['indivlastname'];

      $params['indivstreet_229'] == $result['indivstreet'];
      $params['indivapt_230'] == $result['indivapt'];
      $params['indivcity_231'] == $result['indivcity'];
      $params['indivst_232'] == $result['indivst'];
      $params['headofftitle_234'] == $result['headofftitle'];
      $params['headofffirstname_235'] == $result['headofffirstname'];
      $params['headofflastname_236'] == $result['headofflastname'];
      $params['headoffstreet_238'] == $result['headoffstreet'];
      $params['headoffcity_240'] == $result['headoffcity'];
      $params['headoffst_241'] == $result['headoffst'];
      $params['mngmtcorp_243'] == $result['mngmtcorp'];
      $params['mngmtfirstname_244'] == $result['mngmtfirstname'];
      $params['mngmtlastname_245'] == $result['mngmtlastname'];
      $params['mngmtstreetnum_246'] == $result['mngmtstreetnum'];
      $params['mngmtstreet_247'] == $result['mngmtstreet'];
      $params['mngmtapt_248'] == $result['mngmtapt'];
      $params['mngmtcity_249'] == $result['mngmtcity'];
      $params['mngmtst_250'] == $result['mngmtst'];
      $params['violations_current_as_of_252'] == $result['violations_current_as_of'];
      $params['headoffapt_255'] == $result['headoffapt'];
      $params['corpstreetnum_256'] == $result['corpstreetnum'];
      $params['headoffstreetnum_257'] == $result['headoffstreetnum'];
      $params['erps_258'] == $result['erps'];
      $params['soldliensopen_260'] == $result['soldliensopen'];
      $params['open_i_violations_261'] == $result['open_i_violations'];
      $params['prioryear_v_to_c_ratio_262'] == $result['prioryear_v_to_c_ratio'];
      $params['indivstreetnum_263'] == $result['indivstreetnum'];
      $params['headoffzip_264'] == $result['headoffzip'];
      $params['indivzip_265'] == $result['indivzip'];
      $params['doc_amount_266'] == $result['doc_amount'];

      $params['corpzip_267'] == $result['corpzip'];
      $params['mngmtzip_268'] == $result['mngmtzip'];
      $params['zip_code_269'] == $result['zip_code'];
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
