<?php

namespace App\Controller;

use App\Service\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ApiUserController
 * @package App\Controller
 */
final class ApiUserController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var UserService */
    private $userService;

    /**
     * ApiUserController constructor.
     * @param SerializerInterface $serializer
     * @param UserService $userService
     */
    public function __construct(SerializerInterface $serializer, UserService $userService)
    {
        $this->serializer = $serializer;
        $this->userService = $userService;
    }

    /**
     * @Rest\Post("/api/user/create", name="createUser")
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request): JsonResponse
    {
        $user = $request->request->get('message');
        $userEntity = $this->userService->createUser($message);
        $data = $this->serializer->serialize($userEntity, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/users", name="getAllUsers")
     * @return JsonResponse
     * @IsGranted("ROLE_FOO")
     */
    public function getAllActions(): JsonResponse
    {
        $userEntities = $this->userService->getAll();
        $data = $this->serializer->serialize($userEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }
}
