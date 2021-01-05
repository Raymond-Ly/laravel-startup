<?php

namespace App\Models\Page;

use App\Models\Common\GlobalsModel;
use App\Models\Page\PageModel;

class PageModelManager
{
    public function build(string $url, ?string $countryCode): PageModel
    {
        $url     = '/' . trim(parse_url($url, PHP_URL_PATH), '/') . '/';
        $globals = $this->buildGlobalModel($countryCode);

        return new PageModel($url, $globals);
    }

    private function buildGlobalModel(?string $countryCode): GlobalsModel
    {
        return new GlobalsModel(
            $countryCode,
            date('Y'),
            utf8_encode(strftime('%B')),
            utf8_encode(strftime('%-m'))
        );
    }
}
