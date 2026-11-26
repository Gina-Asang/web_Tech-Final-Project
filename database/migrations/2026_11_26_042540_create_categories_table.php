<?php
//bringing the laravel tools the file needs; migration, Blueprint and Schema
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//migration is set of instructions to create the categories tables in the database. 

return new class extends Migration //create the migration and gives it to laravel to run
{
    /**
     * Run the migrations.
     */
    public function up(): void // function builds the tables
    {
        Schema::create('categories', function (Blueprint $table) {  //schema creates table called categories and 
            $table->id(); // primary key of the table
            $table->string('name'); // name of the category e.g. Hair Braiding
            $table->string('type'); // type of category: informal or formal
            $table->text('description')->nullable(); // short description of the column, can be left empty
            $table->boolean('is_active')->default(true); /* true or false; new categories are active by default. Decides whether 
            a category is shown on the website or not*/
            $table->timestamps(); // adds created_at and updated_at, filled in automatically. 
            //created_at : date and time of when a category was added
            //updated_at:  date and time of when a category was last update
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // function undoes the migration
    {
        Schema::dropIfExists('categories'); // deletes the categories table if it exists
    }
};