<?php
namespace App\Controller;

class Index extends \Aqua\Base\Controller
{
    public function index()
    {
        $comment =  new \App\Model\Comment;

        $connection = \Aqua\Db\Connection::query($comment->commentList())->asArray();

        $this->render('index', [
            'stable'    => 66,
        ]);
    }

    public function create()
    {
        $this->render('create', [
            'loose'    => 66888,
        ]);
    }
}