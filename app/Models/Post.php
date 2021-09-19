<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;
    protected $table        =   'tb_post';
    protected $primaryKey   =   'id_post';

    public $fillable    =   ['title', 'id_category', 'picture', 'content', 'description'];

    function picture()
    {
        // if ($this->picture && file_exists(public_path('pictures/post/' . $this->picture)))
        //     return asset('pictures/post/' . $this->picture);
        // else
        //     return asset('pictures/logo/no_img.png');

        if ($this->picture && File::exists('pictures/post/' . $this->picture))
            return asset('pictures/post/' . $this->picture);
        else
            return asset('pictures/logo/no_img.png');
    }

    function delete_pict()
    {
        if ($this->picture && File::exists('pictures/post/'. $this->picture))
            return File::delete('pictures/post/' . $this->picture);
    }

    function summary($limit)
    {
        $arr    =   explode(' ', strip_tags($this->content), $limit);
        array_pop($arr);
        return implode(' ', $arr);
    }
}
