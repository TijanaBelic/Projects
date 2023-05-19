<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    //ime tabele
    protected $table='posts';
    //primarni kljuc
    public $primaryKey='id';
    //timestamps
    public $timestamps=true;

    protected $fillable = [
        'title', 'body', 'cover_image', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
