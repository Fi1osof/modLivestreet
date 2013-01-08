<?php
$xpdo_meta_map['Friend']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'friend',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'user_from' => 0,
    'user_to' => 0,
    'status_from' => NULL,
    'status_to' => NULL,
  ),
  'fieldMeta' => 
  array (
    'user_from' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'pk',
    ),
    'user_to' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'pk',
    ),
    'status_from' => 
    array (
      'dbtype' => 'int',
      'precision' => '4',
      'phptype' => 'integer',
      'null' => false,
    ),
    'status_to' => 
    array (
      'dbtype' => 'int',
      'precision' => '4',
      'phptype' => 'integer',
      'null' => false,
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
        'user_from' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'user_to' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_to' => 
    array (
      'alias' => 'user_to',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_to' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
