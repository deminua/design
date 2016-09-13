<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Porfolio extends Model
{

  protected $table = 'porfolios';

    protected $fillable = [
        'name',
        'description',
        'body',
        'created_at',
    ];

    public function files()
    {
        return $this->morphMany('App\File', 'filetable');
    }

    public function avatar()
    {
        return $this->morphMany('App\File', 'filetable')->where('avatar', true);
    }

    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F Y');
    // }



}
