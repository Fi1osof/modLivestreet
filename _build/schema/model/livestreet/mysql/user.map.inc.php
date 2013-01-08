<?php
$xpdo_meta_map['User']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'user',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'user_id' => NULL,
    'user_login' => NULL,
    'user_password' => NULL,
    'user_mail' => NULL,
    'user_skill' => 0,
    'user_date_register' => NULL,
    'user_date_activate' => NULL,
    'user_date_comment_last' => NULL,
    'user_ip_register' => NULL,
    'user_rating' => 0,
    'user_count_vote' => 0,
    'user_activate' => 0,
    'user_activate_key' => NULL,
    'user_profile_name' => NULL,
    'user_profile_sex' => 'other',
    'user_profile_country' => NULL,
    'user_profile_region' => NULL,
    'user_profile_city' => NULL,
    'user_profile_birthday' => NULL,
    'user_profile_about' => NULL,
    'user_profile_date' => NULL,
    'user_profile_avatar' => NULL,
    'user_profile_foto' => NULL,
    'user_settings_notice_new_topic' => 1,
    'user_settings_notice_new_comment' => 1,
    'user_settings_notice_new_talk' => 1,
    'user_settings_notice_reply_comment' => 1,
    'user_settings_notice_new_friend' => 1,
    'user_settings_timezone' => NULL,
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
      'generated' => 'native',
    ),
    'user_login' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '30',
      'phptype' => 'string',
      'null' => false,
      'index' => 'unique',
    ),
    'user_password' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => false,
    ),
    'user_mail' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => false,
      'index' => 'unique',
    ),
    'user_skill' => 
    array (
      'dbtype' => 'float',
      'precision' => '9,3',
      'attributes' => 'unsigned',
      'phptype' => 'float',
      'null' => false,
      'default' => 0,
    ),
    'user_date_register' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'user_date_activate' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
    ),
    'user_date_comment_last' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
    ),
    'user_ip_register' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => false,
    ),
    'user_rating' => 
    array (
      'dbtype' => 'float',
      'precision' => '9,3',
      'phptype' => 'float',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'user_count_vote' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'user_activate' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'index',
    ),
    'user_activate_key' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '32',
      'phptype' => 'string',
      'null' => true,
      'index' => 'index',
    ),
    'user_profile_name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_profile_sex' => 
    array (
      'dbtype' => 'enum',
      'precision' => '\'man\',\'woman\',\'other\'',
      'phptype' => 'string',
      'null' => false,
      'default' => 'other',
      'index' => 'index',
    ),
    'user_profile_country' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '30',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_profile_region' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '30',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_profile_city' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '30',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_profile_birthday' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
    ),
    'user_profile_about' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_profile_date' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => true,
    ),
    'user_profile_avatar' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '250',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_profile_foto' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '250',
      'phptype' => 'string',
      'null' => true,
    ),
    'user_settings_notice_new_topic' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'user_settings_notice_new_comment' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'user_settings_notice_new_talk' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'user_settings_notice_reply_comment' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'user_settings_notice_new_friend' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'user_settings_timezone' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '6',
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
        'user_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_login' => 
    array (
      'alias' => 'user_login',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_login' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_mail' => 
    array (
      'alias' => 'user_mail',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_mail' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_activate_key' => 
    array (
      'alias' => 'user_activate_key',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_activate_key' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'user_activate' => 
    array (
      'alias' => 'user_activate',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_activate' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_rating' => 
    array (
      'alias' => 'user_rating',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_rating' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_profile_sex' => 
    array (
      'alias' => 'user_profile_sex',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_profile_sex' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
