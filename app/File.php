<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

  protected $table = 'files';

    protected $fillable = [
        'name',
        'filename',
        'filesize',
        'sorting',
        'avatar',
        'style',
        'filetable_id',
        'filetable_type',
    ];

    public function filetable()
    {
        return $this->morphTo();
    }
    
}
