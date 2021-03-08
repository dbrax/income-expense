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

     /**
      * Get sum of total income
      */
    public function total_sum_Income() : int
    {
        return Income::sum('amount');
    }


    /**
     * @param int $category
     * @return int
     * function gets sum of an income by a given category ..
     */
    public function sumOfIncomeByCategory(int $category) : int
    {
        return Income::where('incomecategory',$category)->sum('amount');
    }


    /**
     * @param int $category
     * @return int
     * function gets sum of an expense by a given category ..
     */
    public function sumOfExpenseByCategory(int $category) : int
    {
        return Expense::where('expense_category',$category)->sum('amount');
    }

    /**
     * @return int
     *
     * function gets the total income for  the current month
     */
    public function totalIncomeThisMonth() : int
    {
        return Income::whereMonth('date', date('m'))->whereYear('date', date('Y'))->sum('amount');
    }

    /**
     * @return int
     * function that gets the total_sum_of_all_expense
     */
    public function total_sum_Expense() :int
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
