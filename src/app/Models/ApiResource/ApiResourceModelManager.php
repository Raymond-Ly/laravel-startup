<?php

namespace App\Models\ApiResource;

use App\Models\ApiResource\ApiResourceModel;
use Illuminate\Support\Facades\Route;

class ApiResourceModelManager
{
    public function build(): array
    {
        $routeList         = Route::getRoutes()->getRoutes();
        $builtApiResources = [];

        foreach ($routeList as $route) {
            $uri = $route->uri;
            if (str_contains($uri, 'api')) {
                $builtApiResources[] = new ApiResourceModel('/' . $uri, $route->methods);
            }
        }

        return $builtApiResources;
    }
}
