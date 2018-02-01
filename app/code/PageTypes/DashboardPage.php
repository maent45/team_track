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
use SilverStripe\Control\HTTPRequest;

use TeamTrack\Profile;

class DashboardPage extends Page {

  public function Profiles() {
    $profiles = Profile::get();
    return $profiles;
  }

}

class DashboardPage_Controller extends PageController {
  
  private static $allowed_actions = [
    'profile'
  ];
  
  public function profile(HTTPRequest $request) {
    $profile = Profile::get()->byID($request->param('ID'));

    if (!$profile) {
      return $this->httpError(404,'That profile could not be found');
    }
    
    return array (
      'Profile' => $profile
    );
  }
  
}
