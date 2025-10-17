<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'arise'; // <---- Tambahkan ini!

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    // public function faq_bantuans()
    // {
    //     return $this->hasMany(FaqBantuan::class);
    // }
}
