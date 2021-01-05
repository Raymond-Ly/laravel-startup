<?php

namespace App\Models\ApiResource;

class ApiResourceModel
{
    /**
     * @var string
     */
    public $endpoint;

    /**
     * @var array
     */
    public $methods;

    public function __construct(
        string $endpoint,
        array $methods
    ) {
        $this->endpoint = $endpoint;
        $this->methods  = $methods;
    }
}
