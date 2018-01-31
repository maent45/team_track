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
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataObject;

class DashboardPage extends Page {

  public function getMembers() {
    $members = Member::get();

    $membersForDisplay = new ArrayList();

    foreach ($members as $member) {

      $profilePage = ProfilePage::get()->filter(array(
        'MemberID' => $member->ID
      ));

      $results = array(
          'Email' => $member->Email,
          'ProfilePage' => $profilePage
      );

      $membersForDisplay->push($results);
    }

    return $membersForDisplay;
  }

}

class DashboardPage_Controller extends PageController {

}
