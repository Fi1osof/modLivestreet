<?php
$xpdo_meta_map['GeoTarget']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'geo_target',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'geo_type' => NULL,
    'geo_id' => NULL,
    'target_type' => NULL,
    'target_id' => NULL,
    'country_id' => NULL,
    'region_id' => NULL,
    'city_id' => NULL,
  ),
  'fieldMeta' => 
  array (
    'geo_type' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => false,
      'index' => 'pk',
    ),
    'geo_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
    ),
    'target_type' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => false,
      'index' => 'pk',
    ),
    'target_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
    ),
    'country_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => true,
      'index' => 'index',
    ),
    'region_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => true,
      'index' => 'index',
    ),
    'city_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => true,
      'index' => 'index',
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'PRIMARY' => 
    array (
      'alias' => 'PRIMARY',
      'primary' => true,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'geo_type' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'geo_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'target_type' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'target_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'target_type' => 
    array (
      'alias' => 'target_type',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'target_type' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'target_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'country_id' => 
    array (
      'alias' => 'country_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'country_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'region_id' => 
    array (
      'alias' => 'region_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'region_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'city_id' => 
    array (
      'alias' => 'city_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'city_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
  ),
);
