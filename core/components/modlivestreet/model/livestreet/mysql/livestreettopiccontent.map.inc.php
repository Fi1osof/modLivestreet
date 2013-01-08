<?php
$xpdo_meta_map['LivestreetTopicContent']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_topic_content',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'topic_id' => NULL,
    'topic_text' => NULL,
    'topic_text_short' => NULL,
    'topic_text_source' => NULL,
    'topic_extra' => NULL,
  ),
  'fieldMeta' => 
  array (
    'topic_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
    ),
    'topic_text' => 
    array (
      'dbtype' => 'longtext',
      'phptype' => 'string',
      'null' => false,
    ),
    'topic_text_short' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
    ),
    'topic_text_source' => 
    array (
      'dbtype' => 'longtext',
      'phptype' => 'string',
      'null' => false,
    ),
    'topic_extra' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
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
        'topic_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
