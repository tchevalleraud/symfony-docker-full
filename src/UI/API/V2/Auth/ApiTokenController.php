<?php
    namespace App\UI\API\V2\Auth;

    use App\UI\API\APIExtendController;
    use OpenApi\Annotations as OA;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/auth/apitoken", name="auth.apitoken.")
     */
    class ApiTokenController extends APIExtendController {

        /**
         * @Route("/info", name="info", methods={"GET"})
         * @OA\Get(
         *     path="/auth/apitoken/info",
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
        public function info(){
            return new JsonResponse([
                'data'      => [],
                'response'  => $this->getResponse()
            ]);
        }

    }