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
    $existing_bbl = 'custom_' . $custom_id;

    $result = civicrm_api3('Address', 'get', array(
      'sequential' => 1,
      'return' => $existing_bbl,
      'id' => $id,
    ));
    foreach($result['values'] as $key => $value) {
      $bbl = $value[$existing_bbl];
    }

    if ($bbl !== null) {
      $response = civicrm_api3('BipData', 'get', array(
        'sequential' => 1,
        'bip_bbl' => $bbl,
      ));

      if (!empty($response['values'])) {
        foreach ($response['values'] as $key => $result) {
          $set_params = array('entity_id' => $id);

          // 2) the only way to actually set these values is
          // going to be find all custom ids
          $absolute = custom_field_get_id('absolute');
          $set_params['custom_'. $absolute] = $result['absolute'];

          $bip_address = custom_field_get_id('bip_address');
          $set_params['custom_' . $bip_address] = $result['address'];

          $res_unit = custom_field_get_id('res_unit');
          $set_params['custom_' . $res_unit] = $result['res_unit'];

          $tot_unit = custom_field_get_id('tot_unit');
          $set_params['custom_' . $tot_unit] = $result['tot_unit'];

          $num_floors = custom_field_get_id('num_floors');
          $set_params['custom_' . $num_floors] = $result['num_floors'];

          $census_tract = custom_field_get_id('census_tract');
          $set_params['custom_' . $census_tract] = $result['census_tract'];

          $borocode = custom_field_get_id('borocode');
          $set_params['custom_' . $borocode] = $result['borocode'];

          $block = custom_field_get_id('block');
          $set_params['custom_' . $borocode] = $result['block'];

          $lot = custom_field_get_id('lot');
          $set_params['custom_' . $lot] = $result['lot'];

          $commdist = custom_field_get_id('commdist');
          $set_params['custom_' . $commdist] = $result['commdist'];

          $lucategory = custom_field_get_id('lucategory');
          $set_params['custom_' . $lucategory] = $result['lucategory'];

          $year_built = custom_field_get_id('year_built');
          $set_params['custom_' . $year_built] = $result['year_built'];

          $yr_1st_alt = custom_field_get_id('yr_1st_alt');
          $set_params['custom_' . $yr_1st_alt] = $result['yr_1st_alt'];

          $yr_2nd_alt = custom_field_get_id('yr_2nd_alt');
          $set_params['custom_' . $yr_2nd_alt] = $result['yr_2nd_alt'];

          $bldg_class = custom_field_get_id('bldg_class');
          $set_params['custom_' . $bldg_class] = $result['bldg_class'];

          $zoning_gen = custom_field_get_id('zoning_gen');
          $set_params['custom_' . $zoning_gen] = $result['zoning_gen'];

          $zoning = custom_field_get_id('zoning');
          $set_params['custom_' . $zoning] = $result['zoning'];

          $open_violations = custom_field_get_id('open_violations');
          $set_params['custom_' . $open_violations] = $result['open_violations'];

          $open_a_violations = custom_field_get_id('open_a_violations');
          $set_params['custom_' . $open_a_violations] = $result['open_a_violations'];

          $open_b_violations = custom_field_get_id('open_b_violations');
          $set_params['custom_' . $open_b_violations] = $result['open_b_violations'];

          $open_c_violations = custom_field_get_id('open_c_violations');
          $set_params['custom_' . $open_c_violations] = $result['open_c_violations'];

          $prior_year_violations = custom_field_get_id('prior_year_violations');
          $set_params['custom_' . $prior_year_violations] = $result['prior_year_violations'];

          $prior_year_a_violations = custom_field_get_id('prior_year_a_violations');
          $set_params['custom_' . $prior_year_a_violations] = $result['prior_year_a_violations'];

          $prior_year_b_violations = custom_field_get_id('prior_year_b_violations');
          $set_params['custom_' . $prior_year_b_violations] = $result['prior_year_b_violations'];

          $prior_year_c_violations = custom_field_get_id('prior_year_c_violations');
          $set_params['custom_' . $prior_year_c_violations] = $result['prior_year_c_violations'];

          $seven_a = custom_field_get_id('seven_a');
          $set_params['custom_' . $seven_a] = $result['seven_a'];

          $aep = custom_field_get_id('aep');
          $set_params['custom_' . $aep] = $result['aep'];

          $ppi = custom_field_get_id('ppi');
          $set_params['custom_' . $ppi] = $result['ppi'];

          $underlying_conditions = custom_field_get_id('underlying_conditions');
          $set_params['custom_' . $underlying_conditions] = $result['underlying_conditions'];

          $nyc_421a_exempt_properties = custom_field_get_id('nyc_421a_exempt_properties');
          $set_params['custom_' . $nyc_421a_exempt_properties] = $result['nyc_421a_exempt_properties'];

          $dob_violation = custom_field_get_id('dob_violation');
          $set_params['custom_' . $dob_violation] = $result['dob_violation'];

          $ecb_violation = custom_field_get_id('ecb_violation');
          $set_params['custom_' . $ecb_violation] = $result['ecb_violation'];

          $city_lien = custom_field_get_id('city_lien');
          $set_params['custom_' . $city_lien] = $result['city_lien'];

          $water = custom_field_get_id('water');
          $set_params['custom_' . $water] = $result['water'];

          $umbrella = custom_field_get_id('umbrella');
          $set_params['custom_' . $umbrella] = $result['umbrella'];

          $party_name = custom_field_get_id('party_name');
          $set_params['custom_' . $party_name] = $result['party_name'];

          $document_type = custom_field_get_id('document_type');
          $set_params['custom_' . $document_type] = $result['document_type'];

          $recorded_filed = custom_field_get_id('recorded_filed');
          $recorded_filed_date = new DateTime($result['recorded_filed']);
          $stripped_recorded_filed = $recorded_filed_date->format('YmdHis');
          $set_params['custom_' . $recorded_filed] = $stripped_recorded_filed;

          $absolute = custom_field_get_id('absolute');
          $set_params['custom_' . $absolute] = $result['absolute'];

          $per_unit = custom_field_get_id('per_unit');
          $set_params['custom_' . $per_unit] = $result['per_unit'];

          $current_bip_score = custom_field_get_id('current_bip_score');
          $set_params['custom_' . $current_bip_score] = $result['current_bip_score'];

          $score_2015_april = custom_field_get_id('score_2015_april');
          $set_params['custom_' . $score_2015_april] = $result['score_2015_april'];

          $score_2015_jan = custom_field_get_id('score_2015_jan');
          $set_params['custom_' . $score_2015_jan] = $result['score_2015_jan'];

          $score_2014_oct = custom_field_get_id('score_2014_oct');
          $set_params['custom_' . $score_2014_oct] = $result['score_2014_oct'];

          $score_2014_jun = custom_field_get_id('score_2014_jun');
          $set_params['custom_' . $score_2014_jun] = $result['score_2014_jun'];

          $score_2014_feb = custom_field_get_id('score_2014_feb');
          $set_params['custom_' . $score_2014_feb] = $result['score_2014_feb'];

          $score_2013_nov = custom_field_get_id('score_2013_nov');
          $set_params['custom_' . $score_2013_nov] = $result['score_2013_nov'];

          $score_2013_aug = custom_field_get_id('score_2013_aug');
          $set_params['custom_' . $score_2013_aug] = $result['score_2013_aug'];

          $score_2013_april = custom_field_get_id('score_2013_april');
          $set_params['custom_' . $score_2013_april] = $result['score_2013_april'];

          $score_2012_nov = custom_field_get_id('score_2012_nov');
          $set_params['custom_' . $score_2012_nov] = $result['score_2012_nov'];

          $score_2012_june = custom_field_get_id('score_2012_june');
          $set_params['custom_' . $score_2012_june] = $result['score_2012_june'];

          $score_2012_jan = custom_field_get_id('score_2012_jan');
          $set_params['custom_' . $score_2012_jan] = $result['score_2012_jan'];

          $score_2010_2 = custom_field_get_id('score_2010_2');
          $set_params['custom_' . $score_2010_2] = $result['score_2010_2'];

          $score_2010_1 = custom_field_get_id('score_2010_1');
          $set_params['custom_' . $score_2010_1] = $result['score_2010_1'];

          $score_2009_2 = custom_field_get_id('score_2009_2');
          $set_params['custom_' . $score_2009_2] = $result['score_2009_2'];

          $score_2009_1 = custom_field_get_id('score_2009_1');
          $set_params['custom_' . $score_2009_1] = $result['score_2009_1'];

          $score_2008_2 = custom_field_get_id('score_2008_2');
          $set_params['custom_' . $score_2008_2] = $result['score_2008_2'];

          $occurance = custom_field_get_id('occurance');
          $set_params['custom_' . $occurance] = $result['occurance'];

          $average = custom_field_get_id('average');
          $set_params['custom_' . $average] = $result['average'];

          $cdf_avg = custom_field_get_id('cdf_avg');
          $set_params['custom_' . $cdf_avg] = $result['cdf_avg'];

          $corp_name = custom_field_get_id('corp_name');
          $set_params['custom_' . $corp_name] = $result['corp_name'];

          $corp_street = custom_field_get_id('corp_street');
          $set_params['custom_' . $corp_street] = $result['corp_street'];

          $corp_apt = custom_field_get_id('corp_apt');
          $set_params['custom_' . $corp_apt] = $result['corp_apt'];

          $corp_city = custom_field_get_id('corp_city');
          $set_params['custom_' . $corp_city] = $result['corp_city'];

          $corp_state = custom_field_get_id('corp_state');
          $set_params['custom_' . $corp_state] = $result['corp_state'];

          $indiv_first_name = custom_field_get_id('indiv_first_name');
          $set_params['custom_' . $indiv_first_name] = $result['indiv_first_name'];

          $indiv_last_name = custom_field_get_id('indiv_last_name');
          $set_params['custom_' . $indiv_last_name] = $result['indiv_last_name'];

          $indiv_street = custom_field_get_id('indiv_street');
          $set_params['custom_' . $indiv_street] = $result['indiv_street'];

          $indiv_apt = custom_field_get_id('indiv_apt');
          $set_params['custom_' . $indiv_apt] = $result['indiv_apt'];

          $indiv_city = custom_field_get_id('indiv_city');
          $set_params['custom_' . $indiv_city] = $result['indiv_city'];

          $indiv_st = custom_field_get_id('indiv_st');
          $set_params['custom_' . $indiv_st] = $result['indiv_st'];

          $head_off_title = custom_field_get_id('head_off_title');
          $set_params['custom_' . $head_off_title] = $result['head_off_title'];

          $head_off_first_name = custom_field_get_id('head_off_first_name');
          $set_params['custom_' . $head_off_first_name] = $result['head_off_first_name'];

          $head_off_last_name = custom_field_get_id('head_off_last_name');
          $set_params['custom_' . $head_off_last_name] = $result['head_off_last_name'];

          $head_off_street = custom_field_get_id('head_off_street');
          $set_params['custom_' . $head_off_street] = $result['head_off_street'];

          $head_off_city = custom_field_get_id('head_off_city');
          $set_params['custom_' . $head_off_city] = $result['head_off_city'];

          $head_off_st = custom_field_get_id('head_off_st');
          $set_params['custom_' . $head_off_st] = $result['head_off_st'];

          $mngmt_corp = custom_field_get_id('mngmt_corp');
          $set_params['custom_' . $mngmt_corp] = $result['mngmt_corp'];

          $mngmt_first_name = custom_field_get_id('mngmt_first_name');
          $set_params['custom_' . $mngmt_first_name] = $result['mngmt_first_name'];

          $mngmt_last_name = custom_field_get_id('mngmt_last_name');
          $set_params['custom_' . $mngmt_last_name] = $result['mngmt_last_name'];

          $mngmt_street_num = custom_field_get_id('mngmt_street_num');
          $set_params['custom_' . $mngmt_street_num] = $result['mngmt_street_num'];

          $mngmt_street = custom_field_get_id('mngmt_street');
          $set_params['custom_' . $mngmt_street] = $result['mngmt_street'];

          $mngmt_apt = custom_field_get_id('mngmt_apt');
          $set_params['custom_' . $mngmt_apt] = $result['mngmt_apt'];

          $mngmt_city = custom_field_get_id('mngmt_city');
          $set_params['custom_' . $mngmt_city] = $result['mngmt_city'];

          $mngmt_st = custom_field_get_id('mngmt_st');
          $set_params['custom_' . $mngmt_st] = $result['mngmt_st'];

          $violations_current_as_of = custom_field_get_id('violations_current_as_of');
          $violations_date = new DateTime($result['violations_current_as_of']);
          $stripped_violations_current_as_of = $violations_date->format('YmdHis');
          $set_params['custom_' . $violations_current_as_of] = $stripped_violations_current_as_of;

          $head_off_apt = custom_field_get_id('head_off_apt');
          $set_params['custom_' . $head_off_apt] = $result['head_off_apt'];

          $corp_street_num = custom_field_get_id('corp_street_num');
          $set_params['custom_' . $corp_street_num] = $result['corp_street_num'];

          $head_off_street_num = custom_field_get_id('head_off_street_num');
          $set_params['custom_' . $head_off_street_num] = $result['head_off_street_num'];

          $erps = custom_field_get_id('erps');
          $set_params['custom_' . $erps] = $result['erps'];

          $sold_liens_open = custom_field_get_id('sold_liens_open');
          $set_params['custom_' . $sold_liens_open] = $result['sold_liens_open'];

          $open_i_violations = custom_field_get_id('open_i_violations');
          $set_params['custom_' . $open_i_violations] = $result['open_i_violations'];

          $prior_year_v_to_c_ratio = custom_field_get_id('prior_year_v_to_c_ratio');
          $set_params['custom_' . $prior_year_v_to_c_ratio] = $result['prior_year_v_to_c_ratio'];

          $indiv_street_num = custom_field_get_id('indiv_street_num');
          $set_params['custom_' . $indiv_street_num] = $result['indiv_street_num'];

          $head_off_zip = custom_field_get_id('head_off_zip');
          $set_params['custom_' . $head_off_zip] = $result['head_off_zip'];

          $indiv_zip = custom_field_get_id('indiv_zip');
          $set_params['custom_' . $indiv_zip] = $result['indiv_zip'];

          $doc_amount = custom_field_get_id('doc_amount');
          $set_params['custom_' . $doc_amount] = $result['doc_amount'];

          $corp_zip = custom_field_get_id('corp_zip');
          $set_params['custom_' . $corp_zip] = $result['corp_zip'];

          $mngmt_zip = custom_field_get_id('mngmt_zip');
          $set_params['custom_' . $mngmt_zip] = $result['mngmt_zip'];

          $zip_code = custom_field_get_id('zip_code');
          $set_params['custom_' . $zip_code] = $result['zip_code'];

          civicrm_api3('CustomValue', 'create', $set_params);
        }
      } else {
        return;
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
