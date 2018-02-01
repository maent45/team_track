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
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\Director;

use TeamTrack\Profile;

class RegistrationPage extends Page {

  private static $has_many = [
    'Profiles' => Profile::class
  ];

}

class RegistrationPage_Controller extends PageController {

  private static $allowed_actions = [
    'Form',
    'show'
  ];

  public function Form() {
    $fields = new FieldList(
      TextField::create('FirstName'),
      TextField::create('Surname', 'Last Name'),
      TextField::create('Email'),
      TextField::create('Role')
    );

    $actions = new FieldList(
      FormAction::create('submit')
    );

    $required = new RequiredFields('FirstName', 'SurName', 'Email', 'Role');

    $form = new Form($this, 'Form', $fields, $actions, $required);

    return $form;
  }

  public function submit($data, $form) {

    $member = new Member();
    $profile = new Profile();
    $group = Group::get()->filter(['Code' => MemberExtension::DEVELOPER_GROUP])->first();

    $form->saveInto($member);
    $member->write();
    
    $profile->RegistrationPageID = Director::get_current_page()->ID;
    $profile->MemberID = $member->ID;
    $profile->write();

    $member->ProfileID = $profile->ID;
    $member->write();

    if (!$group) {
      $group = Group::create([
        'Title' => 'Developers',
        'Description' => 'Group for Registered Developers',
        'Code' => MemberExtension::DEVELOPER_GROUP
      ]);
      $group->write();
    }

    $member->addToGroupByCode(MemberExtension::DEVELOPER_GROUP);

    $form->sessionMessage('Account registered! ' . $data['FirstName'], 'success');
    return $this->redirectBack();
  }

  public function show(HTTPRequest $request) {
    $profile = Profile::get()->byID($request->param('ID'));

    if(!$profile) {
      return $this->httpError(404,'That region could not be found');
    }

    return array (
      'Profile' => $profile
    );
  }

}
