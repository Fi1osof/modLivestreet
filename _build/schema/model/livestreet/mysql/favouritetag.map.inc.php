<?php
$xpdo_meta_map['FavouriteTag']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'favourite_tag',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'user_id' => NULL,
    'target_id' => NULL,
    'target_type' => NULL,
    'is_user' => 0,
    'text' => NULL,
  ),
  'fieldMeta' => 
  array (
    'user_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'index',
    ),
    'target_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
    'target_type' => 
    array (
      'dbtype' => 'enum',
      'precision' => '\'topic\',\'comment\',\'talk\'',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'is_user' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'text' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'user_id_target_type_id' => 
    array (
      'alias' => 'user_id_target_type_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_id' => 
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
    'target_type_id' => 
    array (
      'alias' => 'target_type_id',
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
    'is_user' => 
    array (
      'alias' => 'is_user',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'is_user' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'text' => 
    array (
      'alias' => 'text',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'text' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
