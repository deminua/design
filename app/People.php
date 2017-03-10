<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
  protected $table = 'people';

    protected $fillable = [
		'name',
		'surname',
		'patronymic',
		'phone',
		'city',
		'description',
    ];



}
