<?php

namespace Epmnzava\IncomeExpense\Tests;

use Orchestra\Testbench\TestCase;
use Epmnzava\IncomeExpense\IncomeExpenseServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [IncomeExpenseServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
