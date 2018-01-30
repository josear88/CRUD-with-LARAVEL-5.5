<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';

  protected $fillable = ['content','user_id'];

  public function user(){
    return $this->belongsTo(User::class);
  }
}
