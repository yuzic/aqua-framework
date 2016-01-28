<?php
namespace App\Controller;

class Index extends \Aqua\Base\Controller
{
    public function index($id)
    {
        try {
            $comment =  new \App\Model\Comment;
            $connection = \Aqua\Db\Connection::query($comment->commentList())->asArray();
            if (!$connection) {
                throw new \Exception('emoty list comment');
            }
        } catch (\Exception $e) {
            echo  $e->getMessage();
        }

        $this->render('index', [
            'stable'    => 66,
            'id'    => (int) $id
        ]);
    }

    public function create()
    {
        $this->render('create', [
            'loose'    => 66888,

        ]);
    }
}
