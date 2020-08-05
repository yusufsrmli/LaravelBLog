<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenus extends Model
{
    protected $table='sub_menu';

    public $timestamps='true';

    protected $fillable=[
        'menu_id',
        'title',
        'content',
        'order',
    ];

    public function subMenu()
    {
        return $this->hasMany('App\Model\SubMenus','menu_id','id');
    }
}
