<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;

    protected $tb_students = 'students';
    protected $pk_nisn = 'nisn';
    protected $fillable = [
        'nisn',
        'full_name',
        'call_name',
        'gender_id',
        'birth_date',
        'birth_place',
        'religion_id',
        'citizenship',
        'child_order',
        'sibling_count',
        'language',
        'image',
        'address_id'
    ];

    public function gender(){
        return $this->belongsTo(Genders::class);
    }
    
    public function religion(){
        return $this->belongsTo(Religions::class);
    }
    
}
