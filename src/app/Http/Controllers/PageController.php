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
        if ($request->has('country')) {
            $_GET['country'] = $request->get('country');
        }

        if ($request->has('state')) {
            $_GET['state'] = $request->get('state');
        }

        if ($request->get('url')) {
            $url  = '/' . trim(parse_url($request->get('url'), PHP_URL_PATH), '/') . '/';
        } else {
            // TODO: Build standard error response methods
            return response()->json(['error' => 'Bad Request, url query string must be provided'], 400);
        }

        return response()->json($this->pageModelManager->build($url, $request->get('country')), 200);
    }
}
