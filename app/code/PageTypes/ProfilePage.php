<?php

use TeamTrack\Extensions\MemberExtension;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Security\Group;
use SilverStripe\Security\Member;
use SilverStripe\Control\Director;

class ProfilePage extends Page {

  public function member() {
    $member = Member::get()->filter(array(
      'ProfilePageID' => Director::get_current_page()->ID
    ));
    return $member;
  }

  private static $has_one = [
    'Member' => Member::class
  ];

}

class ProfilePage_Controller extends PageController {

}
