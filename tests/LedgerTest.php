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
use CreateIncomeTable;
use CreateLedgerTable;
use Epmnzava\IncomeExpense\IncomeExpense;
use Orchestra\Testbench\TestCase;
use Epmnzava\IncomeExpense\IncomeExpenseServiceProvider;
use Log;

class LedgerTest extends TestCase
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

        require_once __DIR__ . '/../database/migrations/create_ledger_table.php';

        (new CreateLedgerTable())->up();

        require_once __DIR__ . '/../database/migrations/create_income_category_table.php';
        require_once __DIR__ . '/../database/migrations/create_income_table.php';

        (new CreateIncomeCategoryTable())->up();
        (new CreateIncomeTable())->up();


        require_once __DIR__ . '/../database/migrations/create_expense_category_table.php';
        require_once __DIR__ . '/../database/migrations/create_expense_table.php';

        (new CreateExpenseCategoryTable())->up();
        (new CreateExpenseTable())->up();
    }

    /**
     * A test to a add new income on a ledger 
     */
    public function can_add_income_on_ledger()
    {
        $income=new IncomeExpense;
        $newincome = $income->newIncome(1, "dashboard printer", 4000, "it is an amazing printer");

        $ledger=$income->add_transaction_on_ledger($newincome,"INC","INEX9990");


       
        $this->assertDatabaseHas("ledger",  [
            "transaction_id" => "INEX9990",
            "transaction_type" => "INC",
            "amount"=>4000,
            "transaction_type_category"=>"1"
        ]);
    }


      /**
     * A test to a add new expense  on a ledger
     */
    public function can_add_expense_on_ledger()
    {
        $expense=new IncomeExpense;
        $newexpense = $expense->newIncome(1, "dashboard printer", 4000, "it is an amazing printer");

        $ledger=$newexpense->add_transaction_on_ledger($newexpense,"EXP","INEX9990");


       
        $this->assertDatabaseHas("ledger_pop",  [
            "transaction_id" => "INEX9990",
            "transaction_type" => "INC",
            "amount"=>4000,
            "transaction_type_category"=>"1"
        ]);
    }


}
