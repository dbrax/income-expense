<?php

namespace Epmnzava\IncomeExpense;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Epmnzava\IncomeExpense\Skeleton\SkeletonClass
 */
class IncomeExpenseFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'income-expense';
    }
}
