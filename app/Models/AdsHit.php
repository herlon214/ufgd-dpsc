<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsHit extends Model {
    protected $table = 'ads_hits';
    public $timestamps = false;

    public function Ads() {
        return $this->belongsTo('\App\Models\Ads', 'ads_id', 'id');
    }
}
