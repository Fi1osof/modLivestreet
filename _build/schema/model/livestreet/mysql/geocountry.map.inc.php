<?php
$xpdo_meta_map['GeoCountry']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'geo_country',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name_ru' => NULL,
    'name_en' => NULL,
    'code' => NULL,
    'sort' => 0,
  ),
  'fieldMeta' => 
  array (
    'name_ru' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'name_en' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'code' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '5',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'sort' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'sort' => 
    array (
      'alias' => 'sort',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'sort' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'name_ru' => 
    array (
      'alias' => 'name_ru',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'name_ru' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'name_en' => 
    array (
      'alias' => 'name_en',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'name_en' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'code' => 
    array (
      'alias' => 'code',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'code' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
