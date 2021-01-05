<?php

namespace App\Http\Controllers;

use App\Models\Page\PageModelManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $pageModelManager;

    public function __construct(PageModelManager $pageModelManager)
    {
        $this->pageModelManager = $pageModelManager;
    }

    public function show(Request $request): JsonResponse
    {
        $country = $request->has('country') ? $request->get('country') : null;
        $url     = $request->has('url') ? $request->get('url') : null;

        if ($url) {
            $url  = '/' . trim(parse_url($url, PHP_URL_PATH), '/') . '/';
        } else {
            // TODO: Build standard error response methods
            return response()->json(['error' => 'Bad Request, url query string must be provided'], 400);
        }

        return response()->json($this->pageModelManager->build($url, $country), 200);
    }
}
