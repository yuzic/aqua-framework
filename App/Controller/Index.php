<?php
/**
 * Created by PhpStorm.
 * User: itcoder
 * Date: 08.12.15
 * Time: 18:31
 */

namespace App\Controller;


class Index extends \Aqua\Base\Controller
{
    public function index()
    {
        $comment =  new \App\Model\Comment;

        $connection = \Aqua\Db\Connection::query($comment->commentList())->asArray();

        print_r($connection);
    }
}