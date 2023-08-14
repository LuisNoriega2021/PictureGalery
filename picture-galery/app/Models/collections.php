<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    use Uuids;

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['title', 'details', 'users_id', 'state',  'create_time'];

    public function images()
    {
        return $this->hasMany(Imagenes::class);
    }
}
