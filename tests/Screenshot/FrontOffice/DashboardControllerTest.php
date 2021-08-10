<?php
    namespace App\Tests\Screenshot\FrontOffice;

    use App\Tests\_extend\PantherTestCaseExtend;
    use Symfony\Component\Panther\PantherTestCase;

    /**
     * @group screenshot
     */
    class DashboardControllerTest extends PantherTestCase {

        use PantherTestCaseExtend;

        public function test_EN_Index(){
            $client = $this->getAuthenticatedPantherClient($this->getPantherClient(), "thibault.chevalleraud@gmail.com");
            $this->takeScreenshot($client, "/en/dashboard.html", "en_dashboard_index.jpg");
        }

    }