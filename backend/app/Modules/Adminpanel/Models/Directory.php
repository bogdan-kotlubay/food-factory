<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;


class Directory extends Model
{
    protected $fillable = ['name'];

    public static function add($fields)
    {
        $directory = new static;
        $directory->fill($fields);
        $directory->save();

        return $directory;
    }

}
