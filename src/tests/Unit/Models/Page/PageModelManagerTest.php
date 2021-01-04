<?php

namespace Tests\Unit\Models\Page;

use App\Models\Common\GlobalsModel;
use App\Models\Page\PageModel;
use App\Models\Page\PageModelManager;
use Tests\TestCase;

class PageModelManagerTest extends TestCase
{
    /** @test */
    public function its_build_method_appends_a_trailing_slash_to_url_query_string()
    {
        $pageModelManager = new PageModelManager;

        $actual = $pageModelManager->build('/gambling', null)->page;

        $this->assertEquals('/gambling/', $actual);
    }

    /** @test */
    public function its_build_method_declares_the_country_code_if_not_null()
    {
        $pageModelManager = new PageModelManager;

        $actual = $pageModelManager->build('/gambling', 'GB')->globals->countryCode;

        $this->assertEquals('GB', $actual);
    }

    /** @test */
    public function its_build_method_returns_a_built_page_model()
    {
        $pageModelManager = new PageModelManager;

        $actual = $pageModelManager->build('/gambling', 'GB');
        $expected = new PageModel(
            '/gambling/',
            new GlobalsModel('GB', date('Y'), utf8_encode(strftime('%B')), utf8_encode(strftime('%-m')))
        );

        $this->assertEquals($expected, $actual);
    }
}
