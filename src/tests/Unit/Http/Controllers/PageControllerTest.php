<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /** @test */
    public function it_returns_200_success_if_url_query_string_is_found ()
    {
        $response = $this->get('/api/page?url=/gambling');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_400_bad_request_if_url_query_string_is_not_provided ()
    {
        $response = $this->get('/api/page');

        $response->assertStatus(400);
    }

    /** @test */
    public function it_returns_the_correct_json_structure_for_page_model ()
    {
        $this->get('/api/page?url=/gambling')->assertJsonStructure([
            'page',
            'globals'
        ]);
    }

    /** @test */
    public function it_returns_the_page_response_based_on_the_country_code_from_query_string_if_specified ()
    {
        $this->get('/api/page?url=/gambling&country=GB')->assertJson([
            'globals' => [
                'countryCode' => 'GB'
            ]
        ]);
    }

    /** @test */
    public function it_appends_a_trailing_forward_slash_to_url_query_string ()
    {
        $this->get('/api/page?url=/gambling&country=GB')->assertJson([
            'page' => '/gambling/'
        ]);
    }
}
