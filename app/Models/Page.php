<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

//     function slideshow()
//     {
//         if ($this->slideshow && File::exists('pictures/slideshow/' . $this->slideshow))
//             return asset('pictures/slideshow/' . $this->slideshow);
//         else
//             return asset('pictures/logo/no_img.png');
//     }
// }
}