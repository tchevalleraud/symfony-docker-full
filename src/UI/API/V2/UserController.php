<?php
    namespace App\UI\API\V2;

    use App\Domain\_mysql\System\Repository\UserRepository;
    use App\UI\API\APIExtendController;
    use Knp\Component\Pager\PaginatorInterface;
    use OpenApi\Annotations as OA;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("", name="user.")
     */
    class UserController extends APIExtendController {

        /**
         * @Route("/users", name="all", methods={"GET"})
         * @OA\Get(
         *     path="/users",
         *     security={{"ApiKeyAuth":{}}},
         *     tags={"User"},
         *     @OA\Parameter(name="limit", description="Page size", in="query", required=false, @OA\Schema(type="integer", default="10")),
         *     @OA\Parameter(name="page", description="Page number", in="query", required=false, @OA\Schema(type="integer", default="1")),
         *     @OA\Response(
         *         response=200,
         *         description="200 - OK",
         *         @OA\JsonContent(
         *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User")),
         *             @OA\Property(property="paginate", type="array", @OA\Items(), ref="#/components/schemas/Paginate"),
         *             @OA\Property(property="response", type="array", @OA\Items(), ref="#/components/schemas/Response200")
         *         )
         *     ),
         *     @OA\Response(response=401, description="Unauthorized", ref="#/components/responses/Unauthorized")
         * )
         */
        public function users(Request $request, UserRepository $userRepository, PaginatorInterface $paginator){
            $users = $paginator->paginate($userRepository->findAll(), $request->query->getInt('page', 1), $request->query->getInt('limit', 10));

            $data = [];
            foreach ($users->getItems() as $user){
                $data[] = [
                    'id'        => $user->getId(),
                    'email'     => $user->getEmail(),
                    'roles'     => $user->getRoles(),
                    'password'  => $user->getPassword(),
                    'apiToken'  => $user->getApiToken()
                ];
            }

            return new JsonResponse([
                'data'      => $data,
                'paginate'  => $this->getPaginate($users),
                'response'  => $this->getResponse()
            ]);
        }

        /**
         * @Route("/users/{id}", name="show", methods={"GET"})
         * @OA\Get(
         *     path="/users/{id}",
         *     security={{"ApiKeyAuth":{}}},
         *     tags={"User"},
         *     @OA\Response(
         *         response=200,
         *         description="200 - OK",
         *         @OA\JsonContent(
         *             @OA\Property(property="data", type="array", @OA\Items(), ref="#/components/schemas/User"),
         *             @OA\Property(property="response", type="array", @OA\Items(), ref="#/components/schemas/Response200")
         *         )
         *     ),
         *     @OA\Response(response=401, description="Unauthorized", ref="#/components/responses/Unauthorized")
         * )
         */
        public function usersShow(){
            return new JsonResponse([
                'data'      => [],
                'response'  => $this->getResponse()
            ]);
        }

    }