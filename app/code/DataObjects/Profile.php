<?php

namespace TeamTrack;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

class Profile extends DataObject {

  private static $table_name = 'TeamTrack_Profile';

  private static $has_one = [
    'RegistrationPage' => 'RegistrationPage',
    'Member' => Member::class
  ];

  public function Link() {
    $dashboardPage = DataObject::get_one('DashboardPage');
    return $dashboardPage->Link('profile/'.$this->ID);
  }
  
  private static $summary_fields = [
    'Member.Email' => 'Email',
    'Member.FirstName' => 'First name',
    'Member.Surname' => 'Last name'
  ];

}
