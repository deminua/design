<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Medium implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        #$image->fit(800, null);
        #eturn $image->resizeCanvas(800, 800, 'center', false, 'ffffff');
        #eturn $image->resizeCanvas(600, 600, 'center');

       $image->heighten(600, function ($constraint) {
		    $constraint->upsize();
		});

       return $image->resizeCanvas(600, 600, 'center');
 
    }
}