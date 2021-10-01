<?php

namespace App\Repository;

use App\Model\Db\PublicSchema\PostModel;

class PostRepository
{
    /**
     * @var PostModel
     */
    private $postModel;

    public function __construct(PostModel $postModel)
    {
        $this->postModel = $postModel;
    }

    /**
     * @param int $id
     * @return array
     */
    public function findPostByid(int $id)
    {
       return $this->postModel->findPostByid($id)->current();
    }

    /**
     * @return \PommProject\ModelManager\Model\CollectionIterator
     */
    public function findAllPosts()
    {
        return $this->postModel->findAllPosts();
    }

}