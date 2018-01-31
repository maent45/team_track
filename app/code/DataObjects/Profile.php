<?php

namespace TeamTrack;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

class Profile extends DataObject {

  private static $table_name = 'TeamTrack_Profile';

  private static $has_one = [
    'RegistrationPage' => RegistrationPage::class,
    'Member' => Member::class
  ];

  public function Link() {
    return $this->RegistrationPage()->Link('show/'.$this->ID);
  }

}
