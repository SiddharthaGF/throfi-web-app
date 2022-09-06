<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'last_name', 
        'ocupation', 
        'birthdate', 
        'district', 
        'nutritional_diagnosis', 
        'type_of_surgery',
    ];

    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('name', 'like', "%$name");
    }

    public function scopeLastName($query, $last_name)
    {
        if ($last_name)
            return $query->where('last_name', 'like', "%$last_name");
    }

    

}
