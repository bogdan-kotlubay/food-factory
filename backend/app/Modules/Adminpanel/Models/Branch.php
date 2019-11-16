<?php

namespace App\Modules\Adminpanel\Models;

use App\Category;
use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{
    protected $fillable = ['name'];
    /*

    public function positions()
    {
        return $this->belongsToMany(
            Position::class,
            'position_branches',
            'branch_id',
            'position_id'

        );
    }

    */
    public static function add($fields)
    {
        $branch = new static;
        $branch->fill($fields);
        $branch->save();

        return $branch;
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }
}
