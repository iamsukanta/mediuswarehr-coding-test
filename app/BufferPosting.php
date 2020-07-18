<?php

namespace Bulkly;

use Illuminate\Database\Eloquent\Model;
use Bulkly\SocialPosts;
use Bulkly\SocialPostGroups;
use Bulkly\SocialAccounts;

class BufferPosting extends Model
{
   public function groupInfo()
    {
        return $this->hasOne(SocialPostGroups::Class, 'id', 'group_id');
    }
   public function accountInfo()
    {
        return $this->hasOne(SocialAccounts::Class, 'id', 'account_id');
    }

    public function social_posts()
    {
        return $this->belongsTo(SocialPosts::Class, 'post_id','id');
    }

}
