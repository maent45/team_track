<?php

namespace TeamTrack\Extensions;

use SilverStripe\Security\MemberAuthenticator\MemberLoginForm;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Security\Member;
use SilverStripe\Control\Controller;

class MemberLoginFormExtension extends MemberLoginForm {

	public function __construct($controller, $name, $fields = null, $actions = null, $checkCurrentUser = null) {
		
		parent::__construct($controller, $name, $fields, $actions, $checkCurrentUser);
		if (Member::currentUser()){
			$redirectTo = 'registration';
			return Controller::curr()->redirect($redirectTo);
		}
	}
}
