<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul_tiket'
            ]
        ];
    }

    protected $guarded = [];

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'perusahaan_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function fototransportasi(){
        return $this->hasMany(FotoTransportasi::class);
    }

    public function deskripsitiket(){
        return $this->hasMany(DeskripsiTiket::class);
    }
}
