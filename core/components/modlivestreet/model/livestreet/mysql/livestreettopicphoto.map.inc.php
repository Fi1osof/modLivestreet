<?php
$xpdo_meta_map['LivestreetTopicPhoto']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_topic_photo',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'topic_id' => NULL,
    'path' => NULL,
    'description' => NULL,
    'target_tmp' => NULL,
  ),
  'fieldMeta' => 
  array (
    'topic_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => true,
      'index' => 'index',
    ),
    'path' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
    ),
    'description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
    'target_tmp' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '40',
      'phptype' => 'string',
      'null' => true,
      'index' => 'index',
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'topic_id' => 
    array (
      'alias' => 'topic_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'topic_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'target_tmp' => 
    array (
      'alias' => 'target_tmp',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'target_tmp' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
  ),
);
