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
use Carbon\Carbon;

class AccountingData
{



    public function _construct(){

    }

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
    public function total_sum_of_income_this_month() : int
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

    /**
     * @return int
     * function that gets total expense for the current month
     */
    public function totalExpenseThisMonth() : int
    {
        return Expense::whereMonth('date', date('m'))->whereYear('date', date('Y'))->sum('amount');
    }


    /**
     * @return int
     * function that gets totalincome of the current year
     */
    public function totalIncomeThisYear() : int
    {
        return Income::whereYear('date', date('Y'))->sum('amount');
    }

    /**
     * @return int
     *
     *sum_of_total_income_last_year
     */
    public function sum_of_total_income_last_year() : int
    {
        $date = new Carbon();


        return Income::whereYear('date',$date->subYear()->format('Y'))->sum('amount');
    }

    /**
     * @return int
     *
     * sum_of_total_income_last_month
     */

    public function sum_of_total_income_last_month() : int
    {
        $date = new Carbon();


        return Income::whereYear('date',$date->subMonth()->format('m'))->sum('amount');
    }


    /**
     * @return int
     *
     * function that
     */
    public function sum_of_expense_this_year() : int
    {
        return Expense::whereYear('date', date('Y'))->sum('amount');
    }

    /**
     * @return ExpenseCategory[]|\Illuminate\Database\Eloquent\Collection
     *
     * Function to return all Expense Categories
     */
    public function getExpenseCategories()
    {
return ExpenseCategory::all();
    }


    /**
     * @return IncomeCategory[]|\Illuminate\Database\Eloquent\Collection
     * Function to return all IncomeCategories
     */
    public function getIncomeCategories()
    {
return IncomeCategory::all();
    }


    /**
     * @param $incomeid
     * @return Income
     *
     * Function to return specific income instance per income if passed
     */
    public function getIncomeById($incomeid) : Income
    {

        return Income::find($incomeid);
    }


    /**
     * @param $expenseid
     * @return Expense
     * Function to return specific expense instance per expense id passed
     */
    public function getExpenseById($expenseid) : Expense
    {

        return Expense::find($expenseid);
    }

    /**
     * @return Expense[]|\Illuminate\Database\Eloquent\Collection
     * function to get all expenses
     */
    public function getAllExpenses(){

        return Expense::all();
    }


    /**
     * @return Income[]|\Illuminate\Database\Eloquent\Collection
     * function to get all incomes
     */
    public function getAllIncomes()
    {

        return Income::all();
    }



}
