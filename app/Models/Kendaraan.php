<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Parental\HasChildren;

class Kendaraan extends Model
{
    protected $connection = 'mongodb';
    use HasFactory, HasChildren;

    protected $fillable = ['tahun', 'warna', 'harga'];
    protected $childTypes = [
        'mobil' => Mobil::class,
        'motor' => Motor::class,
    ];
}
