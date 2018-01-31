<?php

namespace TeamTrack\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Assets\File;

use TeamTrack\Profile;
use TeamTrack\Notification;

class MemberExtension extends DataExtension {

  // define the group code
  const DEVELOPER_GROUP = 'developer_group';

  private static $db = [
    'Role' => 'Varchar',
    'Bio' => 'HTMLText'
  ];

  private static $has_one = [
    'ProfileImage' => File::class,
    'ProfilePage' => ProfilePage::class,
    'Profile' => Profile::class
  ];

  private static $has_many = [
    'Notifications' => Notification::class
  ];

  public function canView($member = null, $context = []) {
    return true;
  }

}
