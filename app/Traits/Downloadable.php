<?php
namespace App\Traits;

use App\Models\Image;
    
trait Downloadable {
public function download(Image $image) {
		
            return $this->download($image->path);
		}
	}
?>