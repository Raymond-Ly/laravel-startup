<?php


namespace App\Models\Common;


class GlobalsModel
{
    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $currentYear;

    /**
     * @var string
     */
    public $currentMonth;

    /**
     * @var string
     */
    public $currentMonthNumber;

    public function __construct(
        ?string $countryCode,
        string $currentYear,
        string $currentMonth,
        string $currentMonthNumber
    ) {
        $this->countryCode = $countryCode;
        $this->currentYear = $currentYear;
        $this->currentMonth = $currentMonth;
        $this->currentMonthNumber = $currentMonthNumber;
    }
}
