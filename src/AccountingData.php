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

class AccountingData
{

    public function totalIncome()
    {
        return Income::sum('amount');
    }
    public function totalIncomeByCategory(int $category)
    {
        return Income::where('incomecategory',$category)->sum('amount');
    }
    public function totalIncomeThisMonth()
    {
        return Income::whereMonth('date', date('m'))->whereYear('date', date('Y'))->sum('amount');
    }

    public function totalExpense()
    {
        return Expense::sum('amount');
    }

    public function totalExpenseThisMonth()
    {
        return Expense::whereMonth('date', date('m'))->whereYear('date', date('Y'))->sum('amount');
    }

    public function totalIncomeThisYear()
    {
        return Income::whereYear('date', date('Y'))->sum('amount');
    }
    public function totalExpenseThisYear()
    {
        return Expense::whereYear('date', date('Y'))->sum('amount');
    }
}
