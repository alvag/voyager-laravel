<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysVoyager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'customers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table( 'orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('order_status_id')->references('id')->on('order_status');
            $table->foreign('address_id')->references('id')->on('customer_addresses');
        });
        Schema::table( 'products', function (Blueprint $table) {
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        });
        Schema::table( 'product_categories', function (Blueprint $table) {
            $table->foreign('parent_id')->nullable()->references('id')->on('product_categories');
        });
        Schema::table( 'order_lines', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table( 'shipments', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });
        Schema::table( 'invoices', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('invoice_status_id')->references('id')->on('invoice_status');
        });
        Schema::table( 'payments', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });
        Schema::table( 'customer_payment_methods', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
        Schema::table( 'customer_addresses', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
        });
        Schema::table( 'product_images', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
