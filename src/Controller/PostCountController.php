<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;

class PostCountController {

    private $postRepository;
    
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository=$postRepository;    
    }
    public function __invoke(Request $request)
    {
        $onlineQuery = $request->get('online');
        $condition = [];

        if($onlineQuery !== null){
            $condition = ['online' => $onlineQuery === '1' ? true : false];
        }

        $numberOfArticles = $this->postRepository->count($condition);

        return $numberOfArticles;
    }
}