<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Large implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        #return $image->resize(1600, null)->insert('images/watermark.png');

        $image->widen(1400, function ($constraint) {
    			$constraint->upsize();
		});

		return $image->insert('images/watermark.png', 'bottom-right', 20, 20);

    }
}