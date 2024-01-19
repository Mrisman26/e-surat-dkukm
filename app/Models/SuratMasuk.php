<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $primaryKey = 'idsuratmasuk';

    protected $table = 'suratmasuk';

    protected $fillable = [
        'nosurat',
        'tglsurat',
        'tglditerima',
        'perihal',
        'pengirim',
        'foto',
        // 'original_name',
        'ringkasan'
    ];

}
