<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $casts = [
        'id' => 'string',
    ];
    protected $keyType = 'string';

    protected $fillable = ['code_district', 'name', 'code_zone'];
    protected $hidden = ['created_at', 'updated_at'];

    public function scopeCodeDistrict($query, $code)
    {
        if ($code)
            return $query->select('code_zone', 'name')->where('code_district', "=", "$code");
    }


}
