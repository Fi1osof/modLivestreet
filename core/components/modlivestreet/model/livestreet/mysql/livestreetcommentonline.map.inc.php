<?php
$xpdo_meta_map['LivestreetCommentOnline']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_comment_online',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'comment_online_id' => NULL,
    'target_id' => NULL,
    'target_type' => 'topic',
    'target_parent_id' => 0,
    'comment_id' => NULL,
  ),
  'fieldMeta' => 
  array (
    'comment_online_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
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
      'precision' => '\'topic\',\'talk\'',
      'phptype' => 'string',
      'null' => false,
      'default' => 'topic',
      'index' => 'index',
    ),
    'target_parent_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'comment_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
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
        'comment_online_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'id_type' => 
    array (
      'alias' => 'id_type',
      'primary' => false,
      'unique' => true,
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
          'null' => false,
        ),
      ),
    ),
    'comment_id' => 
    array (
      'alias' => 'comment_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'comment_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'type_parent' => 
    array (
      'alias' => 'type_parent',
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
        'target_parent_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
