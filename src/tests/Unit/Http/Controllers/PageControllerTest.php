<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /** @test */
    public function its_show_method_returns_200_success_if_url_query_string_is_found()
    {
        $response = $this->get('/api/page?url=/gambling');

        $response->assertStatus(200);
    }

    /** @test */
    public function its_show_method_returns_400_bad_request_if_url_query_string_is_not_provided()
    {
        $response = $this->get('/api/page');

        $response->assertStatus(400);
    }

    /** @test */
    public function its_show_method_returns_the_correct_json_structure_for_page_response()
    {
        $this->get('/api/page?url=/gambling')->assertJsonStructure([
            'page',
            'globals'
        ]);
    }
}
