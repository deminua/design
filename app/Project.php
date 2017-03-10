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

    public function days()
    {       
            if($this->term_at) {
            $term = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->term_at);
            $term = Carbon\Carbon::parse($term);
            $start = Carbon\Carbon::now();
            return $start->diffInDays($term, false);
            }
    }

    public function warning_sign()
    {   
        if(empty($this->finish_at) and $this->days()) {
            if($this->days() < 0) { return 'glyphicon glyphicon-warning-sign'; }
        }
    }

    public function warning()
    {       
        if(empty($this->finish_at) and $this->days()) {
                $days = $this->days();
                if($days <= 0) { return 'danger text-danger'; }
                if($days <= '2') { return 'danger'; }
                if($days < '5') { return 'warning'; }
        }
    }

}
