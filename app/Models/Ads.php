<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model {
    protected $table = 'ads';

    public function Hits() {
        return $this->hasMany('\App\Models\AdsHit', 'ad_id', 'id');
    }
}
