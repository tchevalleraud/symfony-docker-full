<?php
    use OpenApi\Annotations as OA;

    /**
     * @OA\Info(
     *     title="Symfony Docker Full - API",
     *     version="0.1-alpha",
     *     @OA\Contact(email="thibault.chevalleraud@gmail.com")
     * )
     *
     * @OA\Server(
     *     url="http://localhost:9002/api/v2",
     *     description="Swagger docker API"
     * )
     *
     * @OA\SecurityScheme(
     *     securityScheme="ApiKeyAuth",
     *     type="apiKey",
     *     in="header",
     *     name="X-AUTH-TOKEN"
     * )
     *
     * @OA\Tag(name="Authorization", description="API token and permissions")
     * @OA\Tag(name="User", description="Current, local and external user management")
     *
     * @OA\Response(
     *     response="Unauthorized",
     *     description="401 - Unauthorized",
     *     @OA\JsonContent(
     *         @OA\Property(property="code", type="integer", default="401"),
     *         @OA\Property(property="message", type="string", default="Unauthorized")
     *     )
     * )
     * @OA\Response(
     *     response="NotFound",
     *     description="404 - Not found",
     *     @OA\JsonContent(
     *         @OA\Property(property="code", type="integer", default="404"),
     *         @OA\Property(property="message", type="string")
     *     )
     * )
     *
     * @OA\Schema(
     *     schema="DateTime",
     *     allOf={
     *         @OA\Schema(
     *             @OA\Property(property="date", type="string", format="date-time"),
     *             @OA\Property(property="timezone_type", type="integer", default="3"),
     *             @OA\Property(property="timezone", type="string", default="UTC")
     *         )
     *     }
     * )
     * @OA\Schema(
     *     schema="Paginate",
     *     allOf={
     *         @OA\Schema(
     *             @OA\Property(property="count", type="integer"),
     *             @OA\Property(property="page", type="integer", default="1"),
     *             @OA\Property(property="total_count", type="integer"),
     *             @OA\Property(property="total_page", type="integer", default="1")
     *         )
     *     }
     * )
     * @OA\Schema(
     *     schema="Response200",
     *     allOf={
     *         @OA\Schema(
     *             @OA\Property(property="code", type="integer", default="200"),
     *             @OA\Property(property="datetime", type="array", @OA\Items(), ref="#/components/schemas/DateTime"),
     *             @OA\Property(property="message", type="string", default="OK")
     *         )
     *     }
     * )
     */