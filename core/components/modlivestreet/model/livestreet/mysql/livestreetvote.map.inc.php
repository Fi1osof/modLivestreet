<?php
$xpdo_meta_map['LivestreetVote']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'livestreet_vote',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'target_id' => 0,
    'target_type' => 'topic',
    'user_voter_id' => NULL,
    'vote_direction' => 0,
    'vote_value' => 0,
    'vote_date' => NULL,
    'vote_ip' => '',
  ),
  'fieldMeta' => 
  array (
    'target_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
      'index' => 'pk',
    ),
    'target_type' => 
    array (
      'dbtype' => 'enum',
      'precision' => '\'topic\',\'blog\',\'user\',\'comment\'',
      'phptype' => 'string',
      'null' => false,
      'default' => 'topic',
      'index' => 'pk',
    ),
    'user_voter_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
    ),
    'vote_direction' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '2',
      'phptype' => 'integer',
      'null' => true,
      'default' => 0,
    ),
    'vote_value' => 
    array (
      'dbtype' => 'float',
      'precision' => '9,3',
      'phptype' => 'float',
      'null' => false,
      'default' => 0,
    ),
    'vote_date' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
    ),
    'vote_ip' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '15',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
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
        'target_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'target_type' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'user_voter_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'user_voter_id' => 
    array (
      'alias' => 'user_voter_id',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'user_voter_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'vote_ip' => 
    array (
      'alias' => 'vote_ip',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'vote_ip' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
