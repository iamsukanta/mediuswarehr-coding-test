<?php

namespace Bulkly;

use Illuminate\Database\Eloquent\Model;
use App\SocialPosts;
use App\SocialPostGroups;
use App\SocialAccounts;

class BufferPosting extends Model
{
   public function groupInfo()
    {
        return $this->belongsTo(SocialPostGroups::Class, 'id', 'group_id');
    }
   public function accountInfo()
    {
        return $this->hasOne(SocialAccounts::Class, 'id', 'account_id');
    }

    public function postInfo()
    {
        return $this->belongsTo(SocialPosts::Class,'id','post_id');
    }

}
