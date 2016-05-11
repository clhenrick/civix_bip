<?php

require_once 'bipdata.civix.php';

/**
 * See if a CiviCRM custom field exists
 * @param string $field_label
 *   custom field name to look for, corresponds to field civicrm_custom_field.label
 * @return custom id
 *   custom field id if it exists, else zero
 */
function custom_field_get_id($field_label) {
  $result = 0;
  $response = civicrm_api3('CustomField', 'get', array(
    'sequential' => 1,
    'label' => $field_label,
  ));
  foreach($response['values'] as $key => $value) {
    $result = $value['id'];
  }
  return $result;
}

function bipdata_civicrm_pre($op, $objectName, $id, &$params) {
  // This hook fires all the time, only run this code if we're creating/editing an address
  if ($objectName == 'Address' && $op == 'edit') {
    $custom_id = custom_field_get_id('BBL');
    $custom_field = 'custom_' . $custom_id;

    // 1) the custom_153 field as part of the params is
    // returned as custom_153_id_from_db (like custom_153_1218)
    // why is that?
    $result = civicrm_api3('Address', 'get', array(
      'sequential' => 1,
      'return' => $custom_field,
      'id' => $id,
    ));
    foreach($result['values'] as $key => $value) {
      $bbl = $value[$custom_field];
    }

    if ($bbl !== null) {
      // Write some code to get the BIP values from someplace else.  Could be an API call or a SQL call or whatever.
      // Example using API (assumes BIP data is its own object)
      $response = civicrm_api3('BipData', 'get', array(
        'sequential' => 1,
        'bip_bbl' => $bbl,
      ));

      foreach ($response['values'] as $key => $result) {
        $set_params = array('entityID' => $id);

        // 2) is the only way to actually set these values
        // going to be, a) find all custom ids, then create an array
        // with var names as keys and the custom_ID as the value?
        $set_params['custom_391'] = $result['absolute'];
        CRM_Core_BAO_CustomValueTable::setValues($set_params);

        // $set_params['bip_address_270'] = $result['address'];
        // $set_params['res_unit_154'] = $result['res_unit'];
        // $set_params['tot_unit_155'] = $result['tot_unit'];
        // $set_params['num_floors_156'] = $result['num_floors'];
        // $set_params['census_tract_157'] = $result['census_tract'];
        // $set_params['borocode_159'] = $result['borocode'];
        // $set_params['block_160'] = $result['block'];
        // $set_params['lot_161'] = $result['lot'];
        // $set_params['commdist_162'] = $result['commdist'];
        // $set_params['lucategory_163'] = $result['lucategory'];
        // $set_params['year_built_164'] = $result['year_built'];
        // $set_params['yr_1st_alt_165'] = $result['yr_1st_alt'];
        // $set_params['yr_2nd_alt_166'] = $result['yr_2nd_alt'];
        // $set_params['bldg_class_167'] = $result['bldg_class'];
        // $set_params['zoning_gen_168'] = $result['zoning_gen'];
        // $set_params['zoning_169'] = $result['zoning'];
        // $set_params['open_violations_171'] = $result['open_violations'];
        // $set_params['open_a_violations_172'] = $result['open_a_violations'];
        // $set_params['open_b_violations_173'] = $result['open_b_violations'];
        // $set_params['open_c_violations_174'] = $result['open_c_violations'];
        // $set_params['prioryear_violations_175'] = $result['prioryear_violations'];
        // $set_params['prioryear_a_violations_176'] = $result['prioryear_a_violations'];
        // $set_params['prioryear_b_violations_177'] = $result['prioryear_b_violations'];
        // $set_params['prioryear_c_violations_178'] = $result['prioryear_c_violations'];
        // $set_params['seven_a_179'] = $result['seven_a'];
        // $set_params['aep_180'] = $result['aep'];
        // $set_params['ppi_181'] = $result['ppi'];
        // $set_params['underlying_conditions_182'] = $result['underlying_conditions'];
        // $set_params['nyc_421a_exempt_properties_183'] = $result['nyc_421a_exempt_properties'];
        // $set_params['dob_violation_186'] = $result['dob_violation'];
        // $set_params['ecb_violation_187'] = $result['ecb_violation'];
        // $set_params['city_lien_188'] = $result['city_lien'];
        // $set_params['water_190'] = $result['water'];
        // $set_params['umbrella_192'] = $result['umbrella'];
        // $set_params['party_name_193'] = $result['party_name'];
        // $set_params['document_type_194'] = $result['document_type'];
        // $set_params['recorded_filed_196'] = $result['recorded_filed'];
        // $set_params['absolute_197'] = $result['absolute'];
        // $set_params['per_unit_198'] = $result['per_unit'];
        // $set_params['current_bip_score_199'] = $result['current_bip_score'];
        // $set_params['score_2015april_200'] = $result['score_2015april'];
        // $set_params['score_2015jan_201'] = $result['score_2015jan'];
        // $set_params['score_2014oct_202'] = $result['score_2014oct'];
        // $set_params['score_2014jun_203'] = $result['score_2014jun'];
        // $set_params['score_2014feb_204'] = $result['score_2014feb'];
        // $set_params['score_2013nov_205'] = $result['score_2013nov'];
        // $set_params['score_2013aug_206'] = $result['score_2013aug'];
        // $set_params['score_2013april_207'] = $result['score_2013april'];
        // $set_params['score_2012nov_208'] = $result['score_2012nov'];
        // $set_params['score_2012june_209'] = $params['score_2012june'];
        // $set_params['score_2012jan_210'] = $params['score_2012jan'];
        // $set_params['score_2010_2_211'] = $params['score_2010_2'];
        // $set_params['score_2010_1_212'] = $params['score_2010_1'];
        // $set_params['score_2009_2_213'] = $params['score_2009_2'];
        // $set_params['score_2009_1_214'] = $params['score_2009_1'];
        // $set_params['score_2008_2_215'] = $params['score_2008_2'];
        // $set_params['occurance_216'] = $result['occurance'];
        // $set_params['average_217'] = $result['average'];
        // $set_params['cdfavg_218'] = $result['cdfavg'];
        // $set_params['corpname_219'] = $result['corpname'];
        // $set_params['corpstreet_221'] = $result['corpstreet'];
        // $set_params['corpapt_222'] = $result['corpapt'];
        // $set_params['corpcity_223'] = $result['corpcity'];
        // $set_params['corpstate_224'] = $result['corpstate'];
        // $set_params['indivfirstname_226'] = $result['indivfirstname'];
        // $set_params['indivlastname_227'] = $result['indivlastname'];
        // $set_params['indivstreet_229'] = $result['indivstreet'];
        // $set_params['indivapt_230'] = $result['indivapt'];
        // $set_params['indivcity_231'] = $result['indivcity'];
        // $set_params['indivst_232'] = $result['indivst'];
        // $set_params['headofftitle_234'] = $result['headofftitle'];
        // $set_params['headofffirstname_235'] = $result['headofffirstname'];
        // $set_params['headofflastname_236'] = $result['headofflastname'];
        // $set_params['headoffstreet_238'] = $result['headoffstreet'];
        // $set_params['headoffcity_240'] = $result['headoffcity'];
        // $set_params['headoffst_241'] = $result['headoffst'];
        // $set_params['mngmtcorp_243'] = $result['mngmtcorp'];
        // $set_params['mngmtfirstname_244'] = $result['mngmtfirstname'];
        // $set_params['mngmtlastname_245'] = $result['mngmtlastname'];
        // $set_params['mngmtstreetnum_246'] = $result['mngmtstreetnum'];
        // $set_params['mngmtstreet_247'] = $result['mngmtstreet'];
        // $set_params['mngmtapt_248'] = $result['mngmtapt'];
        // $set_params['mngmtcity_249'] = $result['mngmtcity'];
        // $set_params['mngmtst_250'] = $result['mngmtst'];
        // $set_params['violations_current_as_of_252'] = $result['violations_current_as_of'];
        // $set_params['headoffapt_255'] = $result['headoffapt'];
        // $set_params['corpstreetnum_256'] = $result['corpstreetnum'];
        // $set_params['headoffstreetnum_257'] = $result['headoffstreetnum'];
        // $set_params['erps_258'] = $result['erps'];
        // $set_params['soldliensopen_260'] = $result['soldliensopen'];
        // $set_params['open_i_violations_261'] = $result['open_i_violations'];
        // $set_params['prioryear_v_to_c_ratio_262'] = $result['prioryear_v_to_c_ratio'];
        // $set_params['indivstreetnum_263'] == $result['indivstreetnum'];
        // $set_params['headoffzip_264'] = $result['headoffzip'];
        // $set_params['indivzip_265'] = $result['indivzip'];
        // $set_params['doc_amount_266'] = $result['doc_amount'];
        // $set_params['corpzip_267'] = $result['corpzip'];
        // $set_params['mngmtzip_268'] = $result['mngmtzip'];
        // $set_params['zip_code_269'] = $result['zip_code'];
      }
    } else {
      return;
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
