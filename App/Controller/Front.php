<?php
namespace App\Controller;

class Front extends \Aqua\Base\Controller
{
    public function index()
    {
        $comment =  new \App\Model\Comment;

        $connection = \Aqua\Db\Connection::query($comment->commentList())->asArray();

        // print_r($connection);
        $this->render('index', [
            'stable'    => 66,
        ]);
    }

}