<?php

namespace App\Models\Page;

use App\Models\Common\GlobalsModel;

class PageModel
{
    /**
     * @var string
     */
    public $page;

    /**
     * @var GlobalsModel
     */
    public $globals;

    public function __construct(
        string $page,
        GlobalsModel $globals
    ) {
        $this->page    = $page;
        $this->globals = $globals;
    }
}
