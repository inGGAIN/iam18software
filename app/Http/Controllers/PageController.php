<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function slideshow()
    {
        if ($this->slideshow && File::exists('pictures/slideshow/' . $this->slideshow))
            return asset('pictures/slideshow/' . $this->slideshow);
        else
            return asset('pictures/logo/no_img.png');
    }
    // HOMEPAGE
    function Home()
    {
        $data['title']  =   'Home';
        $data['posts']  =   Post::latest()->limit(3)->get();  
        return view     ('page.home', $data);
    }
    // CONTACT
    function Contact()
    {
        $data['title']  ='Contact';
        return view     ('page.contact', $data);
    }
    // ABOUT US
    function AboutUs()
    {
        $data['title']  ='About Us';
        return view     ('page.about', $data);
    }
}