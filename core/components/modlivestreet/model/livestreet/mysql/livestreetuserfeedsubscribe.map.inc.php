<?php
$xpdo_meta_map['LivestreetUserfeedSubscribe']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_userfeed_subscribe',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'user_id' => NULL,
    'subscribe_type' => NULL,
    'target_id' => NULL,
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
    'subscribe_type' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '4',
      'phptype' => 'integer',
      'null' => false,
    ),
    'target_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
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
        'subscribe_type' => 
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
  ),
);
