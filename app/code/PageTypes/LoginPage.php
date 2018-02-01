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
// use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\Director;

use TeamTrack\Profile;

class LoginPage extends Page {
  public function LoginLink() {
        return '/Security/login?BackURL=' . urlencode($this->Link());
    }

}

class LoginPage_Controller extends PageController {

  private static $allowed_actions = [
    'Form'
  ];

  public function LoginForm() {
    $fields = new FieldList(
      TextField::create('Email'),
      TextField::create('Password')
    );

    $actions = new FieldList(
      FormAction::create('doLogin', 'Login')
    );

    $required = new RequiredFields('Email','Password');

    $form = new Form($this, 'Form', $fields, $actions, $required);

    return $form;
  }

  public function dologin($data)
  {

      if ($member = $this->performLogin($data)) {
          if (!$this->redirectByGroup($data, $member))
              $this->controller->redirect(Director::baseURL());
      } else {
          if ($badLoginURL = Session::get("BadLoginURL")) {
              $this->controller->redirect($badLoginURL);
          } else {
              $this->controller->redirectBack();
          }
      }
  }

}
