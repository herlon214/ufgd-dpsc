<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classified extends Model {
    protected $table = 'classifieds';
    public $timestamps = true;

    public function Comments() {
        return $this->hasMany('\App\Models\Comment', 'classified_id', 'id');
    }

    public function User() {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
}
