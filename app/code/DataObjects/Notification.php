<?php

namespace TeamTrack;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

class Notification extends DataObject {

  private static $db = [
    'Title' => 'Varchar',
    'Description' => 'Text'
  ];

  private static $table_name = 'TeamTrack_Notification';

  private static $has_one = [
    'Member' => Member::class
  ];

}
