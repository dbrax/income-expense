<?php

namespace Epmnzava\IncomeExpense;

use Epmnzava\IncomeExpense\Models\Expense;
use Epmnzava\IncomeExpense\Models\ExpenseCategory;
use Epmnzava\IncomeExpense\Models\Income;
use Epmnzava\IncomeExpense\Models\IncomeCategory;

class IncomeExpense
{

    public function newIncome(int $categoryid, string $income_title, int $amount,string $notes = ""): Income
    {
        return Income::create([
            "incomecategory" => $categoryid,
            "income_title" => $income_title,
            "amount" => $amount,
            "notes" => $notes,
            "date" => date('Y-m-d')
        ]);
    }

    public function newExpense(int $categoryid, string $expense_title,int  $amount, string $notes = ""): Expense
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

    public function deleteExpenseCategory()
    {
    }


    public function deleteIncomeCategory()
    {
    }


    public function updateExpenseCategory()
    {
    }


    public function updateIncomeCategory()
    {
    }
}
