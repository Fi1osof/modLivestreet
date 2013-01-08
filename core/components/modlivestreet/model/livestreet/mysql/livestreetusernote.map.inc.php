<?php
$xpdo_meta_map['LivestreetUserNote']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_user_note',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'target_user_id' => NULL,
    'user_id' => NULL,
    'text' => NULL,
    'date_add' => NULL,
  ),
  'fieldMeta' => 
  array (
    'target_user_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'index',
    ),
    'user_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'index',
    ),
    'text' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
    ),
    'date_add' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'user_id' => 
    array (
      'alias' => 'user_id',
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
      ),
    ),
    'target_user_id' => 
    array (
      'alias' => 'target_user_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'target_user_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
