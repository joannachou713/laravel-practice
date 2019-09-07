<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;

class PostIndexComposer
{
    public function compose(View $view){
        $post_types = PostTypeEloquent::orderBy('name', 'ASC')->get();
        $posts_total = PostEloquent::get()->count();

        $view->with('post_types', $post_types);
        $view->with('posts_total', $posts_total);
    }
}
