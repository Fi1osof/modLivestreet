<?php
$xpdo_meta_map['LivestreetFavourite']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_favourite',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'user_id' => NULL,
    'target_id' => NULL,
    'target_type' => 'topic',
    'target_publish' => 1,
    'tags' => NULL,
  ),
  'fieldMeta' => 
  array (
    'user_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'index',
    ),
    'target_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => true,
      'index' => 'index',
    ),
    'target_type' => 
    array (
      'dbtype' => 'enum',
      'precision' => '\'topic\',\'comment\',\'talk\'',
      'phptype' => 'string',
      'null' => true,
      'default' => 'topic',
    ),
    'target_publish' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => true,
      'default' => 1,
      'index' => 'index',
    ),
    'tags' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '250',
      'phptype' => 'string',
      'null' => false,
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'user_id_target_id_type' => 
    array (
      'alias' => 'user_id_target_id_type',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'target_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
        'target_type' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'target_publish' => 
    array (
      'alias' => 'target_publish',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'target_publish' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'id_type' => 
    array (
      'alias' => 'id_type',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'target_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
        'target_type' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
  ),
);
