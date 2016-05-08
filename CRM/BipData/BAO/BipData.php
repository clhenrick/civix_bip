<?php

class CRM_BipData_BAO_BipData extends CRM_BipData_DAO_BipData {

  /**
   * Create a new BipData based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_BipData_DAO_BipData|NULL
   *
  public static function create($params) {
    $className = 'CRM_BipData_DAO_BipData';
    $entityName = 'BipData';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */
}
