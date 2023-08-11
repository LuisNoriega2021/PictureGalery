<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['title', 'details', 'path', 'disks', 'collection_id', 'create_time'];
}
