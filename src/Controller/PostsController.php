<?php

namespace App\Controller;

use App\Model\Db\PublicSchema\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class PostsController extends AbstractController
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;

    }

    /**
     * @param Post $post
     * @ParamConverter(name="post", converter="post")
     * @return JsonResponse
     * @throws \PommProject\ModelManager\Exception\ModelException
     */
    public function postAction(Post $post)
    {
        $security = $post->get('security');
        if ($security == true ){

            /**
             * @Security("is_granted('ROLE_OFFICE')")
             */
            $empty = 'empty post';
            return $this->json($empty);


        }
        return $this->json($post);
    }


    /**
     * @return JsonResponse
     */
    public function postsAction(){
        $post = $this->postRepository->findAllPosts();
        return $this->json($post);

    }

//    public function createPostAction(){
//        $post = $this->postRepository->createPost();
//        return $this
//    }
}
