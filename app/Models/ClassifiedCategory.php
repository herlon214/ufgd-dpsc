<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassifiedCategory extends Model {
    protected $table = 'classifieds_categories';

    public static function getAll() {
        $categories = ClassifiedCategory::get();

        return  $categories;
    }
}
