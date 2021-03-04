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
use CreateExpenseTable;
use CreateIncomeCategoryTable;
use Epmnzava\IncomeExpense\IncomeExpense;
use Orchestra\Testbench\TestCase;
use Epmnzava\IncomeExpense\IncomeExpenseServiceProvider;
use Log;

class ExpenseTest extends TestCase
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

        require_once __DIR__ . '/../database/migrations/create_expense_category_table.php';
        require_once __DIR__ . '/../database/migrations/create_expense_table.php';

        (new CreateExpenseCategoryTable())->up();
        (new CreateExpenseTable())->up();
    }

    /**
     * A test to a add new expense 
     */
    public function can_add_expense()
    {
        $expense=new IncomeExpense;
        $newexpense=$expense->newExpense(1,"dashboard printer",4000,"very costful printer");

        $this->assertDatabaseHas("income",  [
            "expense_category" => 1,
            "expense_title" => "dashboard printer",
            "amount"=>4000,
            "notes"=>"very costful printer"
        ]);
    }

    /**
     * A test to a add expense category
     */
    public function test_new_expense_category()
    {
        $category = new IncomeExpense;
        $expense_category = $category->addExpenseCategory('test_category', 'test_description');


        $this->assertDatabaseHas("expense_category",  [
            "category" => "test_category",
            "description" => "test_description"
        ]);
    }
}
