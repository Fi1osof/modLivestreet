<?php
$xpdo_meta_map['TopicQuestionVote']= array (
  'package' => 'livestreet',
  'version' => '1.1',
  'table' => 'topic_question_vote',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'topic_id' => NULL,
    'user_voter_id' => NULL,
    'answer' => NULL,
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
    'user_voter_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
    ),
    'answer' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '4',
      'phptype' => 'integer',
      'null' => false,
    ),
  ),
  'tableMeta' => 
  array (
  ),
  'indexes' => 
  array (
    'topic_id_user_id' => 
    array (
      'alias' => 'topic_id_user_id',
      'primary' => false,
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
  ),
);
