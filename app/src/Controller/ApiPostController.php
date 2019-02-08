<?php

namespace App\Controller;

use App\Service\PostService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Post;

/**
 * Class ApiPostController
 * @package App\Controller
 */
final class ApiPostController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var PostService */
    private $postService;

    /**
     * ApiPostController constructor.
     * @param SerializerInterface $serializer
     * @param PostService $postService
     */
    public function __construct(SerializerInterface $serializer, PostService $postService)
    {
        $this->serializer = $serializer;
        $this->postService = $postService;
    }
    
    /**
     * @Rest\Post("/api/post/create", name="createPost")
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request): JsonResponse
    {
        $message = $request->request->get('message');
        $postEntity = $this->postService->createPost($message);
        $data = $this->serializer->serialize($postEntity, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/posts", name="getAllPosts")
     * @return JsonResponse
     * @IsGranted("ROLE_FOO")
     */
    public function getAllActions(): JsonResponse
    {
        $postEntities = $this->postService->getAll();
        $data = $this->serializer->serialize($postEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Put("/api/post/{id}", name="updatePost")
     * @return JsonResponse
     * @IsGranted("ROLE_FOO")
     */
    public function updateAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $postEntity = $this->postService->validMessage($id);

        $data = $this->serializer->serialize($id, 'json');

        return new JsonResponse($data, 200, [], true);
    }
}
