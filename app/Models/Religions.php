<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religions extends Model
{
    use HasFactory;

    protected $tables = 'religions';
    protected $primaryKey = 'id';
    protected $fillable = ['religion'];
    
    public function student(){
        return $this->belongsTo(students::class);
    }
}
