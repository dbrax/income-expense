<?php


/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github:https://github.com/dbrax/income-expense
 * Email: epmnzava@gmail.com
 * 
 */

namespace Epmnzava\IncomeExpense;

use Epmnzava\IncomeExpense\Models\Expense;
use Epmnzava\IncomeExpense\Models\ExpenseCategory;
use Epmnzava\IncomeExpense\Models\Income;
use Epmnzava\IncomeExpense\Models\IncomeCategory;
use Epmnzava\IncomeExpense\Models\Ledger;

class IncomeExpense extends AccountingData
{


    public function add_income(int $categoryid, string $income_title, int $amount, string $notes = "", $transaction_id = "0"): Income
    {

        $income = $this->newIncome($categoryid, $income_title, $amount, $notes, $transaction_id);

        if ($transaction_id == 0)
            $transaction_id = $this->set_transaction_id($income);


        $ledger = $this->add_transaction_on_ledger($income, "INC", $transaction_id);

        return $income;
    }


    public function add_expense(int $categoryid, string $income_title, int $amount, string $notes = "", $transaction_id = "0"): Expense
    {

        $expense = $this->newExpense($categoryid, $income_title, $amount, $notes, $transaction_id);

        if ($transaction_id == 0)
            $transaction_id = $this->set_transaction_id($expense);


        $ledger = $this->add_transaction_on_ledger($expense, "EXP", $transaction_id);

        return $expense;
    }

    public function set_transaction_id($income)
    {
        $prefix = config('income-expense.transaction_id_prefix');
        $length = config('income-expense.transaction_id_length');

        $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $str = '';

        $max = mb_strlen($keyspace, '8bit') - 1;

        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }

        return $prefix . $str;
    }
    public function newIncome(int $categoryid, string $income_title, int $amount, string $notes = ""): Income
    {
        return Income::create([
            "incomecategory" => $categoryid,
            "income_title" => $income_title,
            "amount" => $amount,
            "notes" => $notes,
            "date" => date('Y-m-d')
        ]);
    }

    public function add_transaction_on_ledger($transactionObj, $type, $transaction_id): Ledger
    {

        $ledger = new Ledger;
        $ledger->transaction_id = $transaction_id;
        $ledger->transaction_type = $type;
        $ledger->transaction_type_category = $transactionObj->incomecategory;
        $ledger->amount = $transactionObj->amount;
        $ledger->save();
        return $ledger;
    }

    public function newExpense(int $categoryid, string $expense_title, int  $amount, string $notes = ""): Expense
    {
        return Expense::create([
            "expense_category" => $categoryid,
            "expense_title" => $expense_title,
            "amount" => $amount,
            "notes" => $notes,
            "date" => date('Y-m-d')
        ]);
    }


    public function addExpenseCategory($categoryname, $description): ExpenseCategory
    {
        return  ExpenseCategory::create([
            "category" => $categoryname,
            "description" => $description,
            "date" => date('Y-m-d')
        ]);
    }


    public function addIncomeCategory($categoryname, $description): IncomeCategory
    {

        return  IncomeCategory::create([
            "category" => $categoryname,
            "description" => $description,
            "date" => date('Y-m-d')
        ]);
    }

    public function deleteExpenseCategory($expensecategoryid)
    {
    }


    public function deleteIncomeCategory($incomecategoryid)
    {
    }


    public function updateExpenseCategory($expensecategoryid)
    {
    }


    public function updateIncomeCategory($incomecategoryid)
    {
    }
}
