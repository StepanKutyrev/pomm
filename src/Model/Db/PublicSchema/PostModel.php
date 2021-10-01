<?php

namespace App\Model\Db\PublicSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;
use App\Model\Db\PublicSchema\AutoStructure\Post as PostStructure;

/**
 * PostModel
 *
 * Model class for table post.
 *
 * @see Model
 */
class PostModel extends Model
{
    use WriteQueries;

    /**
     * __construct()
     *
     * Model constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->structure = new PostStructure;
        $this->flexible_entity_class = '\App\Model\Db\PublicSchema\Post';
    }

    /**
     * @return \PommProject\ModelManager\Model\CollectionIterator
     */
    public function findAllPosts()
    {
        $sql = <<<SQL
            SELECT *
            FROM
              :post
SQL;
        $sql = strtr($sql,
            [
                ':post'   => $this->getStructure()->getRelation()
            ]
        );
        return $this->query($sql);
    }

    /**
     * @param int $id
     * @return \PommProject\ModelManager\Model\CollectionIterator
     */
    public function findPostByid(int $id)
    {
        $sql = <<<SQL
            SELECT *
            FROM
              :post
            WHERE
              :condition
SQL;

        $sql = strtr($sql,
            [
                ':post'   => $this->getStructure()->getRelation(),
                ':condition' => 'id = $*',
            ]
        );
        return $this->query($sql, [$id]);
    }
}
