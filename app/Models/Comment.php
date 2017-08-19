<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $table = 'comments';

    public function User() {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public function Classified() {
        return $this->hasOne('\App\Models\Classified', 'id', 'classified_id');
    }

}
