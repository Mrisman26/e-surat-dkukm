<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $primaryKey = 'idsuratkeluar';

    protected $table = 'suratkeluar';

    protected $fillable = [
        'tujuan',
        'nosurat',
        'isisurat',
        'tglsurat',
        'filename',
        'original_name',
        'perihal'
    ];

}