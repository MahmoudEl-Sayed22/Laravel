<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\post;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BlogComponent extends Component
{
    public $title;
    public $slug;
    public function render()
    {
        $posts = post::latest()->take(7)->get();
        return view('livewire.blog-component',compact('posts'));
    }

    public function generateSlug()
    {
        $this->slug =SlugService::createSlug(post::class,'slug',$this->title);
    }
    public function store()
    {
        post::create([
            'title'=>$this->title,
            'slug'=>$this->slug
        ]);
    }
}
