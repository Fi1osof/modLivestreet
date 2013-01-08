<?php
$xpdo_meta_map['LivestreetBlogUser']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_blog_user',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'blog_id' => NULL,
    'user_id' => NULL,
    'user_role' => 1,
  ),
  'fieldMeta' => 
  array (
    'blog_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
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
      'index' => 'pk',
    ),
    'user_role' => 
    array (
      'dbtype' => 'int',
      'precision' => '3',
      'phptype' => 'integer',
      'null' => true,
      'default' => 1,
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'blog_id_user_id_uniq' => 
    array (
      'alias' => 'blog_id_user_id_uniq',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'blog_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'user_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'blog_id' => 
    array (
      'alias' => 'blog_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'blog_id' => 
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
  ),
);
