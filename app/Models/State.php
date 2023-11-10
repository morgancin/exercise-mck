<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
                            'pob',
                            'viv',
                            'cvegeo',
                            'pob_fem',
                            'pob_mas',
                            'cve_agee',
                            'nom_agee',
                            'nom_abrev'
                        ];
}
