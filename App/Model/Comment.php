<?php
namespace App\Model;

class Comment extends \Aqua\Db\Model
{
    /**
     * messages on page
     */
    const PAGE_COUNT = 25;

    public $sortListAllow = [
        'name',
        'email',
        'created_at',
    ];

    public $orderListAllow = [
        'DESC',
        'ASC',
    ];

    /**
     * Get list comment
     * @param $page - page id
     * @param string $field
     * @param string $order
     * @return array
     * @throws \Exception
     */
    public function commentList($page, $field = 'created_at', $order = 'DESC')
    {

        $orderSql = $field . ' ' . strtolower($order);

        $sql = 'SELECT
                    "id",
                    "name",
                    "email",
                    "homepage",
                    "ip",
                    "agent",
                    "message",
                    "created_at"
                FROM "comment"
                ORDER BY ' .$orderSql.'
                OFFSET ?offset
                LIMIT ?limit';

        $query = (new \Aqua\Db\Query)->instances($sql, [
            'limit' => self::PAGE_COUNT,
            'offset'    => $this->getOffset($page),

        ]);

        return  \Aqua\Db\Connection::query($query)->asArray();
    }

    public function save(array $params)
    {
        $sql = 'BEGIN;
                INSERT INTO "comment"
                (
                  "name",
                  "email",
                  "homepage",
                  "ip",
                  "agent",
                  "message",
                  "created_at"
                )
                VALUES
                (
                  ?name,
                  ?email,
                  ?homepage,
                  ?ip,
                  ?agent,
                  ?message,
                  ?created_at
                );
                COMMIT;';

        $query = (new \Aqua\Db\Query)->instances($sql, $params);

        return  \Aqua\Db\Connection::query($query);
    }


    public function getCount()
    {
        $sql = 'SELECT count(1) "count"
                FROM "comment"';

        $query = (new \Aqua\Db\Query)->instances($sql, []);

        return \Aqua\Db\Connection::query($query)->asArray()[0];
    }


    protected function getOffset($page)
    {
        $page = ($page <=0) ? 1: $page;

        return  (self::PAGE_COUNT * ($page - 1));
    }
}
