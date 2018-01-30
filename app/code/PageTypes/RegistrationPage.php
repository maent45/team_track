<?php

use TeamTrack\Extensions\MemberExtension;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Group;
use SilverStripe\Security\Member;

class RegistrationPage extends Page {

}

class RegistrationPage_Controller extends PageController {

  private static $allowed_actions = [
    'Form'
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
    $group = Group::get()->filter(['Code' => MemberExtension::DEVELOPER_GROUP])->first();

    $form->saveInto($member);
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

}
