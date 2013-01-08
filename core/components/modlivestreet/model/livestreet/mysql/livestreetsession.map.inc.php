<?php
$xpdo_meta_map['LivestreetSession']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_session',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'session_key' => NULL,
    'user_id' => NULL,
    'session_ip_create' => NULL,
    'session_ip_last' => NULL,
    'session_date_create' => '0000-00-00 00:00:00',
    'session_date_last' => NULL,
  ),
  'fieldMeta' => 
  array (
    'session_key' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '32',
      'phptype' => 'string',
      'null' => false,
      'index' => 'pk',
    ),
    'user_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'unique',
    ),
    'session_ip_create' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '15',
      'phptype' => 'string',
      'null' => false,
    ),
    'session_ip_last' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '15',
      'phptype' => 'string',
      'null' => false,
    ),
    'session_date_create' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
      'default' => '0000-00-00 00:00:00',
    ),
    'session_date_last' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
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
        'session_key' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
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
    'session_date_last' => 
    array (
      'alias' => 'session_date_last',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'session_date_last' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
