<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function contact()
    {
        return view('contacts');
    }

    public function blogPost($id, $welcome = 2)
    {
        $pages = [
            0 => [
                'title' => 'from page 0',
            ],
            1 => [
                'title' => 'from page 1',
            ],
            2 => [
                'title' => 'from page 2',
            ],
        ];

        $welcomes = [
            1 => '<b>Hello</b> ',
            2 => '<b>Welcome to</b> ',
        ];

        return view('blog-post', [
            'data' => $pages[$id],
            'welcome' => $welcomes[$welcome],
        ]);
    }
}
