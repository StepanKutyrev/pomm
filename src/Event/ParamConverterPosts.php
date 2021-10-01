<?php
namespace App\Event;

use App\Model\Db\PublicSchema\Post;
use App\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ParamConverterPosts implements ParamConverterInterface {
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param Request $request
     * @param ParamConverter $configuration
     * @return bool|void
     */
    public function apply (Request $request , ParamConverter $configuration  )
    {
        $id = $request->attributes->get('id');
        if (null === $id ) {
            throw new NotFoundHttpException(sprintf('%s object not found.', $configuration->getClass()));
        }
        $post = $this->postRepository->findPostByid($id);
        $request->attributes->set('post' , $post);

    }

    /**
     * @param ParamConverter $configuration
     * @return bool
     */
    public function supports (ParamConverter $configuration):bool
    {
        return Post::class === $configuration->getClass();
    }
}