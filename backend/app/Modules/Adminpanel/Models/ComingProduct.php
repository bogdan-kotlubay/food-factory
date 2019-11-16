<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;

class ComingProduct extends Model
{
   protected $fillable = ['name','count','unit','comment'];


    public static function add($fields)
    {
        $comingproduct = new static;
        $comingproduct->fill($fields);
        $comingproduct->save();

        return $comingproduct;
    }
}
