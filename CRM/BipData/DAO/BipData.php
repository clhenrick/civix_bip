<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2016                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2016
 *
 * Generated from xml/schema/CRM/BipData/BipData.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_BipData_DAO_BipData extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tablename = 'civicrm_bipdata';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Unique BipData ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * BIP_BBL
   *
   * @var int
   */
  public $bip_bbl;
  /**
   *
   *
   * @var string
   */
  public $address;
  /**
   *
   * @var int
   */
  public $res_unit;
  /**
   *
   * @var int
   */
  public $tot_unit;
  /**
   *
   * @var int
   */
  public $num_floors;
  /**
   *
   * @var float
   */
  public $census_tract;
  /**
   *
   * @var float
   */
  public $borocode;
  /**
   *
   * @var int
   */
  public $block;
  /**
   *
   * @var int
   */
  public $lot;
  /**
   *
   * @var int
   */
  public $commdist;
  /**
   *
   * @var string
   */
  public $lucategory;
  /**
   *
   * @var datetime
   */
  public $year_built;
  /**
   *
   * @var int
   */
  public $yr_1st_alt;
  /**
   *
   * @var int
   */
  public $yr_2nd_alt;
  /**
   *
   * @var string
   */
  public $bldg_class;
  /**
   *
   * @var string
   */
  public $zoning_gen;
  /**
   *
   * @var string
   */
  public $zoning;
  /**
   *
   * @var string
   */
  public $open_violations;
  /**
   *
   * @var string
   */
  public $open_a_violations;
  /**
   *
   * @var
   */
  public $open_b_violations;
  /**
   *
   * @var string
   */
  public $open_c_violations;
  /**
   *
   * @var string
   */
  public $prior_year_violations;
  /**
   *
   * @var string
   */
  public $prior_year_a_violations;
  /**
   *
   * @var string
   */
  public $prior_year_b_violations;
  /**
   *
   * @var string
   */
  public $prior_year_c_violations;
  /**
   *
   * @var string
   */
  public $seven_a;
  /**
   *
   * @var string
   */
  public $aep;
  /**
   *
   * @var
   */
  public $ppi;
  /**
   *
   * @var
   */
  public $underlying_conditions;
  /**
   *
   * @var
   */
  public $nyc_421a_exempt_properties;
  /**
   *
   * @var
   */
  public $prior_year_311_comps;
  /**
   *
   * @var
   */
  public $dob_violation;
  /**
   *
   * @var
   */
  public $ecb_violation;
  /**
   *
   * @var
   */
  public $city_lien;
  /**
   *
   * @var
   */
  public $water;
  /**
   *
   * @var
   */
  public $umbrella;
  /**
   *
   * @var
   */
  public $party_name;
  /**
   *
   * @var
   */
  public $document_type;
  /**
   *
   * @var
   */
  public $recorded_filed;
  /**
   *
   * @var
   */
  public $absolute;
  /**
   *
   * @var
   */
  public $per_unit;
  /**
   *
   * @var
   */
  public $current_bip_score;
  /**
   *
   * @var
   */
  public $score_2015_april;
  /**
   *
   * @var
   */
  public $score_2015_jan;
  /**
   *
   * @var
   */
  public $score_2014_oct;
  /**
   *
   * @var
   */
  public $score_2014_jun;
  /**
   *
   * @var
   */
  public $score_2014_feb;
  /**
   *
   * @var
   */
  public $score_2013_nov;
  /**
   *
   * @var
   */
  public $score_2013_aug;
  /**
   *
   * @var
   */
  public $score_2013_april;
  /**
   *
   * @var
   */
  public $score_2012_nov;
  /**
   *
   * @var
   */
  public $score_2012_june;
  /**
   *
   * @var
   */
  public $score_2012_jan;
  /**
   *
   * @var
   */
  public $score_2010_2;
  /**
   *
   * @var
   */
  public $score_2010_1;
  /**
   *
   * @var
   */
  public $score_2009_2;
  /**
   *
   * @var
   */
  public $score_2009_1;
  /**
   *
   * @var
   */
  public $score_2008_2;
  /**
   *
   * @var
   */
  public $occurance;
  /**
   *
   * @var
   */
  public $average;
  /**
   *
   * @var
   */
  public $cdf_avg;
  /**
   *
   * @var
   */
  public $corp_name;
  /**
   *
   * @var
   */
  public $corp_street;
  /**
   *
   * @var
   */
  public $corp_apt;
  /**
   *
   * @var
   */
  public $corp_city;
  /**
   *
   * @var
   */
  public $corp_state;
  /**
   *
   * @var
   */
  public $indiv_first_name;
  /**
   *
   * @var
   */
  public $indiv_last_name;
  /**
   *
   * @var
   */
  public $indiv_street;
  /**
   *
   * @var
   */
  public $indiv_apt;
  /**
   *
   * @var
   */
  public $indiv_city;
  /**
   *
   * @var
   */
  public $indiv_st;
  /**
   *
   * @var
   */
  public $head_off_title;
  /**
   *
   * @var
   */
  public $head_off_first_name;
  /**
   *
   * @var
   */
  public $head_off_last_name;
  /**
   *
   * @var
   */
  public $head_off_street;
  /**
   *
   * @var
   */
  public $head_off_city;
  /**
   *
   * @var
   */
  public $head_off_st;
  /**
   *
   * @var
   */
  public $mngmt_corp;
  /**
   *
   * @var
   */
  public $mngmt_first_name;
  /**
   *
   * @var
   */
  public $mngmt_last_name;
  /**
   *
   * @var
   */
  public $mngmt_street_num;
  /**
   *
   * @var
   */
  public $mngmt_street;
  /**
   *
   * @var
   */
  public $mngmt_apt;
  /**
   *
   * @var
   */
  public $mngmt_city;
  /**
   *
   * @var
   */
  public $mngmt_st;
  /**
   *
   * @var
   */
  public $violations_current_as_of;
  /**
   *
   * @var
   */
  public $head_off_apt;
  /**
   *
   * @var
   */
  public $corp_street_num;
  /**
   *
   * @var
   */
  public $head_off_street_num;
  /**
   *
   * @var
   */
  public $erps;
  /**
   *
   * @var
   */
  public $sold_liens_open;
  /**
   *
   * @var
   */
  public $open_i_violations;
  /**
   *
   * @var
   */
  public $prior_year_v_to_c_ratio;
  /**
   *
   * @var
   */
  public $indiv_street_num;
  /**
   *
   * @var
   */
  public $head_off_zip;
  /**
   *
   * @var
   */
  public $indiv_zip;
  /**
   *
   * @var
   */
  public $doc_amount;
  /**
   *
   * @var
   */
  public $corp_zip;
  /**
   *
   * @var
   */
  public $mngmt_zip;
  /**
   *
   * @var
   */
  public $zip_code;
  /**
   * class constructor
   *
   * @return civicrm_bipdata
   */
  function __construct()
  {
    $this->__table = 'civicrm_bipdata';
    parent::__construct();
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Bip Data ID') ,
          'description' => 'Unique BipData ID',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_bipdata.id',
          'headerPattern' => '/internal|bip_data?|id$/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'res_unit' => array(
          'name' => 'res_unit',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('res_unit') ,
          'import' => true,
          'where' => 'civicrm_bipdata.res_unit',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'bip_bbl' => array(
          'name' => 'bip_bbl',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('BIP BBL') ,
          'import' => true,
          'where' => 'civicrm_bipdata.bip_bbl',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'address' => array(
          'name' => 'address',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('address') ,
          'import' => true,
          'where' => 'civicrm_bipdata.address',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'tot_unit' => array(
          'name' => 'tot_unit',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('tot_unit') ,
          'import' => true,
          'where' => 'civicrm_bipdata.tot_unit',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'num_floors' => array(
          'name' => 'num_floors',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('num_floors') ,
          'import' => true,
          'where' => 'civicrm_bipdata.num_floors',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'census_tract' => array(
          'name' => 'census_tract',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('census_tract') ,
          'import' => true,
          'where' => 'civicrm_bipdata.census_tract',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'borocode' => array(
          'name' => 'borocode',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('borocode') ,
          'import' => true,
          'where' => 'civicrm_bipdata.borocode',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'block' => array(
          'name' => 'block',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('block') ,
          'import' => true,
          'where' => 'civicrm_bipdata.block',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'lot' => array(
          'name' => 'lot',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('lot') ,
          'import' => true,
          'where' => 'civicrm_bipdata.lot',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'commdist' => array(
          'name' => 'commdist',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('commdist') ,
          'import' => true,
          'where' => 'civicrm_bipdata.commdist',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'lucategory' => array(
          'name' => 'lucategory',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('lucategory') ,
        ) ,
        'year_built' => array(
          'name' => 'year_built',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('year_built') ,
        ) ,
        'yr_1st_alt' => array(
          'name' => 'yr_1st_alt',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('yr_1st_alt') ,
        ) ,
        'yr_2nd_alt' => array(
          'name' => 'yr_2nd_alt',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('yr_2nd_alt') ,
        ) ,
        'bldg_class' => array(
          'name' => 'bldg_class',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('bldg_class') ,
        ) ,
        'zoning_gen' => array(
          'name' => 'zoning_gen',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('zoning_gen') ,
        ) ,
        'zoning' => array(
          'name' => 'zoning',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('zoning') ,
        ) ,
        'open_violations' => array(
          'name' => 'open_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('open_violations') ,
        ) ,
        'open_a_violations' => array(
          'name' => 'open_a_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('open_a_violations') ,
        ) ,
        'open_b_violations' => array(
          'name' => 'open_b_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('open_b_violations') ,
        ) ,
        'open_c_violations' => array(
          'name' => 'open_c_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('open_c_violations') ,
        ) ,
        'prior_year_violations' => array(
          'name' => 'prior_year_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('prior_year_violations') ,
        ) ,
        'prior_year_a_violations' => array(
          'name' => 'prior_year_a_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('prior_year_a_violations') ,
        ) ,
        'prior_year_b_violations' => array(
          'name' => 'prior_year_b_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('prior_year_b_violations') ,
        ) ,
        'prior_year_c_violations' => array(
          'name' => 'prior_year_c_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('prior_year_c_violations') ,
        ) ,
        'seven_a' => array(
          'name' => 'seven_a',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('seven_a') ,
        ) ,
        'aep' => array(
          'name' => 'aep',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('aep') ,
        ) ,
        'ppi' => array(
          'name' => 'ppi',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('ppi') ,
        ) ,
        'underlying_conditions' => array(
          'name' => 'underlying_conditions',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('underlying_conditions') ,
        ) ,
        'nyc_421a_exempt_properties' => array(
          'name' => 'nyc_421a_exempt_properties',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('nyc_421a_exempt_properties') ,
        ) ,
        'prior_year_311_comps' => array(
          'name' => 'prior_year_311_comps',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('prior_year_311_comps') ,
        ) ,
        'dob_violation' => array(
          'name' => 'dob_violation',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('dob_violation') ,
        ) ,
        'ecb_violation' => array(
          'name' => 'ecb_violation',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('ecb_violation') ,
        ) ,
        'city_lien' => array(
          'name' => 'city_lien',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('city_lien') ,
        ) ,
        'water' => array(
          'name' => 'water',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('water') ,
        ) ,
        'umbrella' => array(
          'name' => 'umbrella',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('umbrella') ,
        ) ,
        'party_name' => array(
          'name' => 'party_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('party_name') ,
        ) ,
        'document_type' => array(
          'name' => 'document_type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('document_type') ,
        ) ,
        'recorded_filed' => array(
          'name' => 'recorded_filed',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('recorded_filed') ,
        ) ,
        'absolute' => array(
          'name' => 'absolute',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('absolute') ,
        ) ,
        'per_unit' => array(
          'name' => 'per_unit',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('per_unit') ,
        ) ,
        'current_bip_score' => array(
          'name' => 'current_bip_score',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('current_bip_score') ,
        ) ,
        'score_2015_april' => array(
          'name' => 'score_2015_april',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2015_april') ,
        ) ,
        'score_2015_jan' => array(
          'name' => 'score_2015_jan',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2015_jan') ,
        ) ,
        'score_2014_oct' => array(
          'name' => 'score_2014_oct',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2014_oct') ,
        ) ,
        'score_2014_jun' => array(
          'name' => 'score_2014_jun',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2014_jun') ,
        ) ,
        'score_2014_feb' => array(
          'name' => 'score_2014_feb',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2014_feb') ,
        ) ,
        'score_2013_nov' => array(
          'name' => 'score_2013_nov',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2013_nov') ,
        ) ,
        'score_2013_aug' => array(
          'name' => 'score_2013_aug',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2013_aug') ,
        ) ,
        'score_2013_april' => array(
          'name' => 'score_2013_april',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2013_april') ,
        ) ,
        'score_2012_nov' => array(
          'name' => 'score_2012_nov',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2012_nov') ,
        ) ,
        'score_2012_june' => array(
          'name' => 'score_2012_june',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2012_june') ,
        ) ,
        'score_2012_jan' => array(
          'name' => 'score_2012_jan',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2012_jan') ,
        ) ,
        'score_2010_2' => array(
          'name' => 'score_2010_2',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2010_2') ,
        ) ,
        'score_2010_1' => array(
          'name' => 'score_2010_1',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2010_1') ,
        ) ,
        'score_2009_2' => array(
          'name' => 'score_2009_2',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2009_2') ,
        ) ,
        'score_2009_1' => array(
          'name' => 'score_2009_1',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2009_1') ,
        ) ,
        'score_2008_2' => array(
          'name' => 'score_2008_2',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('score_2008_2') ,
        ) ,
        'occurance' => array(
          'name' => 'occurance',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('occurance') ,
        ) ,
        'average' => array(
          'name' => 'average',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('average') ,
        ) ,
        'cdf_avg' => array(
          'name' => 'cdf_avg',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('cdf_avg') ,
        ) ,
        'corp_name' => array(
          'name' => 'corp_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('corp_name') ,
        ) ,
        'corp_street' => array(
          'name' => 'corp_street',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('corp_street') ,
        ) ,
        'corp_apt' => array(
          'name' => 'corp_apt',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('corp_apt') ,
        ) ,
        'corp_city' => array(
          'name' => 'corp_city',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('corp_city') ,
        ) ,
        'corp_state' => array(
          'name' => 'corp_state',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('corp_state') ,
        ) ,
        'indiv_first_name' => array(
          'name' => 'indiv_first_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_first_name') ,
        ) ,
        'indiv_last_name' => array(
          'name' => 'indiv_last_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_last_name') ,
        ) ,
        'indiv_street' => array(
          'name' => 'indiv_street',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_street') ,
        ) ,
        'indiv_apt' => array(
          'name' => 'indiv_apt',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_apt') ,
        ) ,
        'indiv_city' => array(
          'name' => 'indiv_city',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_city') ,
        ) ,
        'indiv_st' => array(
          'name' => 'indiv_st',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_st') ,
        ) ,
        'head_off_title' => array(
          'name' => 'head_off_title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_title') ,
        ) ,
        'head_off_first_name' => array(
          'name' => 'head_off_first_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_first_name') ,
        ) ,
        'head_off_last_name' => array(
          'name' => 'head_off_last_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_last_name') ,
        ) ,
        'head_off_street' => array(
          'name' => 'head_off_street',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_street') ,
        ) ,
        'head_off_city' => array(
          'name' => 'head_off_city',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_city') ,
        ) ,
        'head_off_st' => array(
          'name' => 'head_off_st',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_st') ,
        ) ,
        'mngmt_corp' => array(
          'name' => 'mngmt_corp',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_corp') ,
        ) ,
        'mngmt_first_name' => array(
          'name' => 'mngmt_first_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_first_name') ,
        ) ,
        'mngmt_last_name' => array(
          'name' => 'mngmt_last_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_last_name') ,
        ) ,
        'mngmt_street_num' => array(
          'name' => 'mngmt_street_num',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_street_num') ,
        ) ,
        'mngmt_street' => array(
          'name' => 'mngmt_street',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_street') ,
        ) ,
        'mngmt_apt' => array(
          'name' => 'mngmt_apt',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_apt') ,
        ) ,
        'mngmt_city' => array(
          'name' => 'mngmt_city',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_city') ,
        ) ,
        'mngmt_st' => array(
          'name' => 'mngmt_st',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_st') ,
        ) ,
        'violations_current_as_of' => array(
          'name' => 'violations_current_as_of',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('violations_current_as_of') ,
        ) ,
        'head_off_apt' => array(
          'name' => 'head_off_apt',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_apt') ,
        ) ,
        'corp_street_num' => array(
          'name' => 'corp_street_num',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('corp_street_num') ,
        ) ,
        'head_off_street_num' => array(
          'name' => 'head_off_street_num',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_street_num') ,
        ) ,
        'erps' => array(
          'name' => 'erps',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('erps') ,
        ) ,
        'sold_liens_open' => array(
          'name' => 'sold_liens_open',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('sold_liens_open') ,
        ) ,
        'open_i_violations' => array(
          'name' => 'open_i_violations',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('open_i_violations') ,
        ) ,
        'prior_year_v_to_c_ratio' => array(
          'name' => 'prior_year_v_to_c_ratio',
          'type' => CRM_Utils_Type::T_FLOAT,
          'title' => ts('prior_year_v_to_c_ratio') ,
        ) ,
        'indiv_street_num' => array(
          'name' => 'indiv_street_num',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_street_num') ,
        ) ,
        'head_off_zip' => array(
          'name' => 'head_off_zip',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('head_off_zip') ,
        ) ,
        'indiv_zip' => array(
          'name' => 'indiv_zip',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('indiv_zip') ,
        ) ,
        'doc_amount' => array(
          'name' => 'doc_amount',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('doc_amount') ,
        ) ,
        'corp_zip' => array(
          'name' => 'corp_zip',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('corp_zip') ,
        ) ,
        'mngmt_zip' => array(
          'name' => 'mngmt_zip',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('mngmt_zip') ,
        ) ,
        'zip_code' => array(
          'name' => 'zip_code',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('zip_code') ,
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'id',
        'bip_bbl' => 'bip_bbl',
        'address' => 'address',
        'res_unit' => 'res_unit',
        'tot_unit' => 'tot_unit',
        'num_floors' => 'num_floors',
        'census_tract' => 'census_tract',
        'borocode' => 'borocode',
        'block' => 'block',
        'lot' => 'lot',
        'commdist' => 'commdist',
        'lucategory' => 'lucategory',
        'year_built' => 'year_built',
        'yr_1st_alt' => 'yr_1st_alt',
        'yr_2nd_alt' => 'yr_2nd_alt',
        'bldg_class' => 'bldg_class',
        'zoning_gen' => 'zoning_gen',
        'zoning' => 'zoning',
        'open_violations' => 'open_violations',
        'open_a_violations' => 'open_a_violations',
        'open_b_violations' => 'open_b_violations',
        'open_c_violations' => 'open_c_violations',
        'prior_year_violations' => 'prior_year_violations',
        'prior_year_a_violations' => 'prior_year_a_violations',
        'prior_year_b_violations' => 'prior_year_b_violations',
        'prior_year_c_violations' => 'prior_year_c_violations',
        'seven_a' => 'seven_a',
        'aep' => 'aep',
        'ppi' => 'ppi',
        'underlying_conditions' => 'underlying_conditions',
        'nyc_421a_exempt_properties' => 'nyc_421a_exempt_properties',
        'prior_year_311_comps' => 'prior_year_311_comps',
        'dob_violation' => 'dob_violation',
        'ecb_violation' => 'ecb_violation',
        'city_lien' => 'city_lien',
        'water' => 'water',
        'umbrella' => 'umbrella',
        'party_name' => 'party_name',
        'document_type' => 'document_type',
        'recorded_filed' => 'recorded_filed',
        'absolute' => 'absolute',
        'per_unit' => 'per_unit',
        'current_bip_score' => 'current_bip_score',
        'score_2015_april' => 'score_2015_april',
        'score_2015_jan' => 'score_2015_jan',
        'score_2014_oct' => 'score_2014_oct',
        'score_2014_jun' => 'score_2014_jun',
        'score_2014_feb' => 'score_2014_feb',
        'score_2013_nov' => 'score_2013_nov',
        'score_2013_aug' => 'score_2013_aug',
        'score_2013_april' => 'score_2013_april',
        'score_2012_nov' => 'score_2012_nov',
        'score_2012_june' => 'score_2012_june',
        'score_2012_jan' => 'score_2012_jan',
        'score_2010_2' => 'score_2010_2',
        'score_2010_1' => 'score_2010_1',
        'score_2009_2' => 'score_2009_2',
        'score_2009_1' => 'score_2009_1',
        'score_2008_2' => 'score_2008_2',
        'occurance' => 'occurance',
        'average' => 'average',
        'cdf_avg' => 'cdf_avg',
        'corp_name' => 'corp_name',
        'corp_street' => 'corp_street',
        'corp_apt' => 'corp_apt',
        'corp_city' => 'corp_city',
        'corp_state' => 'corp_state',
        'indiv_first_name' => 'indiv_first_name',
        'indiv_last_name' => 'indiv_last_name',
        'indiv_street' => 'indiv_street',
        'indiv_apt' => 'indiv_apt',
        'indiv_city' => 'indiv_city',
        'indiv_st' => 'indiv_st',
        'head_off_title' => 'head_off_title',
        'head_off_first_name' => 'head_off_first_name',
        'head_off_last_name' => 'head_off_last_name',
        'head_off_street' => 'head_off_street',
        'head_off_city' => 'head_off_city',
        'head_off_st' => 'head_off_st',
        'mngmt_corp_' => 'mngmt_corp_',
        'mngmt_first_name' => 'mngmt_first_name',
        'mngmt_last_name' => 'mngmt_last_name',
        'mngmt_street_num' => 'mngmt_street_num',
        'mngmt_street' => 'mngmt_street',
        'mngmt_apt' => 'mngmt_apt',
        'mngmt_city' => 'mngmt_city',
        'mngmt_st' => 'mngmt_st',
        'violations_current_as_of' => 'violations_current_as_of',
        'head_off_apt' => 'head_off_apt',
        'corp_street_num' => 'corp_street_num',
        'head_off_street_num' => 'head_off_street_num',
        'erps' => 'erps',
        'sold_liens_open' => 'sold_liens_open',
        'open_i_violations' => 'open_i_violations',
        'prior_year_v_to_c_ratio' => 'prior_year_v_to_c_ratio',
        'indiv_street_num' => 'indiv_street_num',
        'head_off_zip' => 'head_off_zip',
        'indiv_zip' => 'indiv_zip',
        'doc_amount' => 'doc_amount',
        'corp_zip' => 'corp_zip',
        'mngmt_zip' => 'mngmt_zip',
        'zip_code' => 'zip_code',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTablename()
  {
    return self::$_tablename;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['bipdata'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['bipdata'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
