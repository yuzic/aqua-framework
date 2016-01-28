<?php
namespace App\Model;

class Comment extends \Aqua\Db\Model
{
    public function commentList()
    {
        $sql = 'SELECT
                    "id",
                    "name",
                    "email",
                    "message",
                    "created_at"
                FROM "comment3"';

        $query = (new \Aqua\Db\Query)->instances($sql, []);

        return $query;

    }
}
