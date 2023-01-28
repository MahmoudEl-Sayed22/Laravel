<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'Laravel is one of the most popular PHP frameworks for developing web applications. It offers a number of great features such as simple and fast routing, different ways for accessing relational databases, powerful dependency injection and much more.

                In this article we are going to share with you 15 excellent open-source PHP libraries for extending Laravel. You can easily include them in any Laravel project to add various utilities and improve your workflow.',
                'posted_by' => 'mahmoud',
                'created_at' => '2022-01-28 10:05:00',
            ],
            [
                'id' => 2,
                'title' => 'php',
                'description' => 'A PHP is a hypertext preprocessor and it is widely used scripting language, which was designed for the purpose of web development for producing dynamic web pages. For this same purpose, a PHP code will beis embedded inside the HTML source document. The web server along with a processor module, which generates web page, will interpret this document. Knowing how to run PHP can be useful for people using the scripting language. PHP is a general-purpose programming language, a PHP code will be processed',
                'posted_by' => 'Mohamed',
                'created_at' => '2022-01-30 10:05:00',
            ],
            [
                'id' => 3,
                'title' => 'HTML',
                'description' => 'HTML, or Hypertext Markup Language, is the programming language used to build the internet. It is the standard language for web programming, along with CSS and JavaScript. This open-format, text-based type code is extremely versatile, and can be used to embed additional programming languages such as JavaScript. HTML is made up of different elements called tags that dictate the structure of the webpage that are then translated by a web browser into a user-friendly form.',
                'posted_by' => 'esmail',
                'created_at' => '2022-01-2 13:05:00',
            ],
        ];
//        dd($allPosts);
        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return 'insert in database';
    }

    public function show($postId)
    {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'Laravel is one of the most popular PHP frameworks for developing web applications. It offers a number of great features such as simple and fast routing, different ways for accessing relational databases, powerful dependency injection and much more.

                In this article we are going to share with you 15 excellent open-source PHP libraries for extending Laravel. You can easily include them in any Laravel project to add various utilities and improve your workflow.',
                'posted_by' => 'mahmoud',
                'created_at' => '2022-01-28 10:05:00',
            ],
            [
                'id' => 2,
                'title' => 'php',
                'description' => 'A PHP is a hypertext preprocessor and it is widely used scripting language, which was designed for the purpose of web development for producing dynamic web pages. For this same purpose, a PHP code will beis embedded inside the HTML source document. The web server along with a processor module, which generates web page, will interpret this document. Knowing how to run PHP can be useful for people using the scripting language. PHP is a general-purpose programming language, a PHP code will be processed',
                'posted_by' => 'Mohamed',
                'created_at' => '2022-01-30 10:05:00',
            ],
            [
                'id' => 3,
                'title' => 'HTML',
                'description' => 'HTML, or Hypertext Markup Language, is the programming language used to build the internet. It is the standard language for web programming, along with CSS and JavaScript. This open-format, text-based type code is extremely versatile, and can be used to embed additional programming languages such as JavaScript. HTML is made up of different elements called tags that dictate the structure of the webpage that are then translated by a web browser into a user-friendly form.',
                'posted_by' => 'esmail',
                'created_at' => '2022-01-2 13:05:00',
            ],
        ];
        $selectPost='';
        foreach( $allPosts as $post){
            if($postId == $post['id']){
                $selectPost = $post;
            }
        }
                // dd($postId);
        return view('posts.show',[
            'post' => $selectPost,
        ]);
    }
    public function edit($postId)
    {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'Laravel is one of the most popular PHP frameworks for developing web applications. It offers a number of great features such as simple and fast routing, different ways for accessing relational databases, powerful dependency injection and much more.

                In this article we are going to share with you 15 excellent open-source PHP libraries for extending Laravel. You can easily include them in any Laravel project to add various utilities and improve your workflow.',
                'posted_by' => 'mahmoud',
                'created_at' => '2022-01-28 10:05:00',
            ],
            [
                'id' => 2,
                'title' => 'php',
                'description' => 'A PHP is a hypertext preprocessor and it is widely used scripting language, which was designed for the purpose of web development for producing dynamic web pages. For this same purpose, a PHP code will beis embedded inside the HTML source document. The web server along with a processor module, which generates web page, will interpret this document. Knowing how to run PHP can be useful for people using the scripting language. PHP is a general-purpose programming language, a PHP code will be processed',
                'posted_by' => 'Mohamed',
                'created_at' => '2022-01-30 10:05:00',
            ],
            [
                'id' => 3,
                'title' => 'HTML',
                'description' => 'HTML, or Hypertext Markup Language, is the programming language used to build the internet. It is the standard language for web programming, along with CSS and JavaScript. This open-format, text-based type code is extremely versatile, and can be used to embed additional programming languages such as JavaScript. HTML is made up of different elements called tags that dictate the structure of the webpage that are then translated by a web browser into a user-friendly form.',
                'posted_by' => 'esmail',
                'created_at' => '2022-01-2 13:05:00',
            ],
        ];
        $selectPost='';
        foreach( $allPosts as $post){
            if($postId == $post['id']){
                $selectPost = $post;
            }
        }
                // dd($postId);
        return view('posts.edit',[
            'post' => $selectPost,
        ]);
    }
}

