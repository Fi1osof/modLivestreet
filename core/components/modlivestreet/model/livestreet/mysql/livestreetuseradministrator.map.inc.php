<?php
$xpdo_meta_map['LivestreetUserAdministrator']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_user_administrator',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'user_id' => NULL,
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
      'index' => 'pk',
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
      ),
    ),
  ),
);
