<?php

namespace App\Http\Controllers;

use App\Models\ApiResource\ApiResourceModelManager;
use Illuminate\Http\JsonResponse;

class ApiResourceController extends Controller
{
    private $apiResourceModelManager;

    public function __construct(ApiResourceModelManager $apiResourceModelManager)
    {
        $this->apiResourceModelManager = $apiResourceModelManager;
    }

    public function show(): JsonResponse
    {
        return response()->json($this->apiResourceModelManager->build(), 200);
    }
}
