<?php
$xpdo_meta_map['NotifyTask']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'notify_task',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'notify_task_id' => NULL,
    'user_login' => NULL,
    'user_mail' => NULL,
    'notify_subject' => NULL,
    'notify_text' => NULL,
    'date_created' => NULL,
    'notify_task_status' => NULL,
  ),
  'fieldMeta' => 
  array (
    'notify_task_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
    'user_login' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '30',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_mail' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => true,
    ),
    'notify_subject' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '200',
      'phptype' => 'string',
      'null' => true,
    ),
    'notify_text' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
    'date_created' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
      'index' => 'index',
    ),
    'notify_task_status' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '2',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => true,
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
        'notify_task_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'date_created' => 
    array (
      'alias' => 'date_created',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'date_created' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
  ),
);
