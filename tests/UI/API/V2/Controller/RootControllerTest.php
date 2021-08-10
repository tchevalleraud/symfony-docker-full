<?php
    namespace App\Tests\UI\API\V2\Controller;

    use App\Tests\_extend\WebTestCaseExtend;
    use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
    use Symfony\Component\HttpFoundation\Response;

    class RootControllerTest extends WebTestCase {

        use WebTestCaseExtend;

        public function test_Index(){
            $client = static::createClient();
            $apiToken = $this->getUserAPIToken($client, "thibault.chevalleraud@gmail.com");
            $this->requestAPI($client, "GET", "/api/v2", $apiToken);
            $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        }

    }