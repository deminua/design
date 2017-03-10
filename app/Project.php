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

    public function warning_sign()
    {   

        if(empty($this->finish_at)) {
            $term = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->term_at);
            $term = Carbon\Carbon::parse($term);
            $start = Carbon\Carbon::now();

            if($start <= $term->addDay(2)) { return ''; }
            if($start <= $term->addDay(5)) { return ''; }
            if($start > $term) { return 'glyphicon glyphicon-warning-sign'; }
        }

    }

    public function warning()
    {       
        if(empty($this->finish_at)) {
            $term = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->term_at);
            $term = Carbon\Carbon::parse($term);
            $start = Carbon\Carbon::now();

            if($start <= $term->addDay(2)) { return 'danger'; }
            if($start <= $term->addDay(5)) { return 'warning'; }
            if($start > $term) { return 'danger text-danger'; }
        }
    }

}
