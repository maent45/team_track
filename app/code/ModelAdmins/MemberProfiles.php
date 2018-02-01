<?php

namespace TeamTrack;

use Silverstripe\Admin\ModelAdmin;

class MemberProfileAdmin extends ModelAdmin {
 
  private static $managed_models = array (
    'TeamTrack\Profile'
  );
 
  private static $url_segment = 'member-profiles';
  
  private static $menu_title = 'Member Profiles';
}