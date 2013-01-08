<?php
$xpdo_meta_map['Blog']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'blog',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'blog_id' => NULL,
    'user_owner_id' => NULL,
    'blog_title' => NULL,
    'blog_description' => NULL,
    'blog_type' => 'personal',
    'blog_date_add' => NULL,
    'blog_date_edit' => NULL,
    'blog_rating' => 0,
    'blog_count_vote' => 0,
    'blog_count_user' => 0,
    'blog_count_topic' => 0,
    'blog_limit_rating_topic' => 0,
    'blog_url' => NULL,
    'blog_avatar' => NULL,
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
      'generated' => 'native',
    ),
    'user_owner_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'index',
    ),
    'blog_title' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '200',
      'phptype' => 'string',
      'null' => false,
      'index' => 'index',
    ),
    'blog_description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
    ),
    'blog_type' => 
    array (
      'dbtype' => 'enum',
      'precision' => '\'personal\',\'open\',\'invite\',\'close\'',
      'phptype' => 'string',
      'null' => true,
      'default' => 'personal',
      'index' => 'index',
    ),
    'blog_date_add' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'blog_date_edit' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
    ),
    'blog_rating' => 
    array (
      'dbtype' => 'float',
      'precision' => '9,3',
      'phptype' => 'float',
      'null' => false,
      'default' => 0,
    ),
    'blog_count_vote' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'blog_count_user' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'blog_count_topic' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'blog_limit_rating_topic' => 
    array (
      'dbtype' => 'float',
      'precision' => '9,3',
      'phptype' => 'float',
      'null' => false,
      'default' => 0,
    ),
    'blog_url' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '200',
      'phptype' => 'string',
      'null' => true,
      'index' => 'index',
    ),
    'blog_avatar' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '250',
      'phptype' => 'string',
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
        'blog_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_owner_id' => 
    array (
      'alias' => 'user_owner_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_owner_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'blog_type' => 
    array (
      'alias' => 'blog_type',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'blog_type' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'blog_url' => 
    array (
      'alias' => 'blog_url',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'blog_url' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'blog_title' => 
    array (
      'alias' => 'blog_title',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'blog_title' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'blog_count_topic' => 
    array (
      'alias' => 'blog_count_topic',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'blog_count_topic' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
