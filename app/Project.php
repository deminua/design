<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Project extends Model
{
  protected $table = 'projects';

    protected $fillable = [
        'code', 
        'name', 
        'path', 
        'city', 
        'district', 
        'address', 
        'phone', 
        'description', 
        'customer_id', 
        'director_id', 
        'curator_id', 
        'designer_id',
		'start_at',
		'edit_at',
		'term_at',
		'finish_at',
    ];


    public function customer()
    {	
        return $this->belongsto('App\People');
    }

    public function director()
    {
        return $this->belongsto('App\People');
    }

    public function curator()
    {
        return $this->belongsto('App\People');
    }

    public function designer()
    {
        return $this->belongsto('App\People');
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'start_at',
        'edit_at',
        'term_at',
        'finish_at'
    ];
/*
    public function dateConvert($date) {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y'); 
    }

    public function dateConvertBack($date) {
        Carbon\Carbon::createFromFormat('d.m.Y', $date)->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($date) { if($date) { return $this->dateConvert($date); } }
    public function getStartAtAttribute($date)   { if($date) { return $this->dateConvert($date); } }
    public function getEditAtAttribute($date)    { if($date) { return $this->dateConvert($date); } }
    public function getTermAtAttribute($date)    { if($date) { return $this->dateConvert($date); } }
    public function getFinishAtAttribute($date)  { if($date) { return $this->dateConvert($date); } }

    public function setCreatedAtAttribute($date) {
        if($date) { 
            return $this->attributes['created_at'] = $this->dateConvertBack($date);
        }
    }

    public function setStartAtAttribute($date)   {
        if($date) { 
            $value = new Carbon\Carbon($date);
            $date = Carbon\Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d H:i:s');
            $this->attributes['start_at'] = $date;
            return $this->attributes['start_at'];
        }
    }

    public function setEditAtAttribute($date)    {
        if($date) { 
            $value = new Carbon\Carbon($date);
            $date = Carbon\Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d H:i:s');
            $this->attributes['edit_at'] = $date;
            return $this->attributes['edit_at'];
        }
    }

    public function setTermAtAttribute($date)    {
        if($date) { 
            $value = new Carbon\Carbon($date);
            $date = Carbon\Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d H:i:s');
            $this->attributes['term_at'] = $date;
            return $this->attributes['term_at'];
        }
    }

    public function setFinishAtAttribute($date)  {
        if($date) { 
            $value = new Carbon\Carbon($date);
            $date = Carbon\Carbon::createFromFormat('d.m.Y', $value)->format('Y-m-d H:i:s');
            $this->attributes['finish_at'] = $date;
            return $this->attributes['finish_at'];
        }
    }*/



}
