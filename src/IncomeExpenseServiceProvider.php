<?php

namespace Epmnzava\IncomeExpense;

use Illuminate\Support\ServiceProvider;

class IncomeExpenseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'income-expense');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'income-expense');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('income-expense.php'),
            ], 'config');


            if (!class_exists('CreateExpenseCategoryTable') && !class_exists('CreateExpenseTable') && !class_exists('CreateIncomeCategoryTable') && !class_exists('CreateLedgerTable') && !class_exists('CreateIncomeTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_income_category_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_income_category_table.php'),
                    __DIR__ . '/../database/migrations/create_expense_category_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_expense_category_table.php'),
                    __DIR__ . '/../database/migrations/create_expense_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_expense_table.php'),
                    __DIR__ . '/../database/migrations/create_income_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_income_table.php'),
                    __DIR__ . '/../database/migrations/create_ledger_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_ledger_table.php)

                
                ], 'migrations');
            }



            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/income-expense'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/income-expense'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/income-expense'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'income-expense');

        // Register the main class to use with the facade
        $this->app->singleton('income-expense', function () {
            return new IncomeExpense;
        });
    }
}
