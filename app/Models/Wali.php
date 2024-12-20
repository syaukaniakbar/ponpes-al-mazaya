<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Add this import

class Wali extends Model
{
    protected $table = 'wali'; // Add quotes to the table name

    protected $fillable = [
        'nik',
        'nama',
    ]; // Fix the syntax for the $fillable array

    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }

    use HasFactory;
}
