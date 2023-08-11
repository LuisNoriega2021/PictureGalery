<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class imagenes extends Model
{
    use Uuids;

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['title', 'details', 'path', 'disks', 'collection_id', 'create_time'];
}
