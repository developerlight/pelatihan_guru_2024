<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genders extends Model
{
    use HasFactory;

    protected $tables = 'genders';
    protected $priamaryKey = 'id';
    protected $fillable = ['gender'];

    public function student(){
        return $this->belongsTo(students::class);
    }
}
