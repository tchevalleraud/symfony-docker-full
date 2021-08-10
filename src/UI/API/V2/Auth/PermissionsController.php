<?php
    namespace App\UI\API\V2\Auth;

    use App\UI\API\APIExtendController;
    use OpenApi\Annotations as OA;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/auth/permissions", name="auth.permissions.")
     */
    class PermissionsController extends APIExtendController {

        /**
         * @Route("", name="index", methods={"GET"})
         * @OA\Get(
         *     path="/auth/permissions",
         *     security={{"ApiKeyAuth":{}}},
         *     tags={"Authorization"},
         *     @OA\Response(
         *         response=200,
         *         description="200 - OK",
         *         @OA\JsonContent()
         *     ),
         *     @OA\Response(response=401, description="Unauthorized", ref="#/components/responses/Unauthorized")
         * )
         */
        public function index(){
            return new JsonResponse([
                'data'      => [],
                'response'  => $this->getResponse()
            ]);
        }

        /**
         * @Route("/:check", name="check", methods={"POST"})
         * @OA\Post(
         *     path="/auth/permissions/:check",
         *     security={{"ApiKeyAuth":{}}},
         *     tags={"Authorization"},
         *     @OA\Response(response=401, description="Unauthorized", ref="#/components/responses/Unauthorized")
         * )
         */
        public function check(){
            return new JsonResponse([
                'data'      => [],
                'response'  => $this->getResponse()
            ]);
        }

    }