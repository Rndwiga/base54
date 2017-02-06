<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

  protected $fillable = ['dob', 'gender', 'profile_picture', 'facebook',
                          'twitter', 'gplus', 'github', 'bio', 'address', 'user_id'
                        ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
