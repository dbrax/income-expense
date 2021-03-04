<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github:https://github.com/dbrax/income-expense
 * Email: epmnzava@gmail.com
 * 
 */

namespace Epmnzava\IncomeExpense\Tests;

use CreateExpenseCategoryTable;
use CreateIncomeCategoryTable;
use CreateIncomeTable;
use Epmnzava\IncomeExpense\IncomeExpense;
use Orchestra\Testbench\TestCase;
use Epmnzava\IncomeExpense\IncomeExpenseServiceProvider;
use Epmnzava\IncomeExpense\Models\IncomeCategory;
use Log;

class IncomeTest extends TestCase
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


    public function setUp(): void
    {
        parent::setUp();

        require_once __DIR__ . '/../database/migrations/create_income_category_table.php';
        require_once __DIR__ . '/../database/migrations/create_expense_category_table.php';

        (new CreateIncomeCategoryTable())->up();
        (new CreateExpenseCategoryTable())->up();
    }

    public function test_new_income()
    {
        $this->assertTrue(true);
    }

   


    public function test_new_income_category()
    {
        $category = new IncomeExpense;
        $income_category = $category->addIncomeCategory('test_category', 'test_description');


        $this->assertDatabaseHas("income_category",  [
            "category" => "test_category",
            "description" => "test_description"
        ]);
    }
}
