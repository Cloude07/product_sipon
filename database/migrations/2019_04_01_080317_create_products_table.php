<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
			//атрибут с первичным ключом
            $table->bigIncrements('id');
			// создание столбцов таблицы
			$table->string('title',191) -> unique();
			$table->decimal('price',65,2);
			
			$table->bigInteger('manufacturer_id')->unsigned();
			$table->foreign('manufacturer_id')
					->references('id')
					->on('manufacturers')
					->onDelete('CASCADE')
					->onUpdate('RESTRICT');
					$table->bigInteger('user_id')->unsigned();
			$table->foreign('user_id')
					->references('id')
					->on('users')
					->onDelete('CASCADE')
					->onUpdate('RESTRICT');
			//атрибут created_at и updated_at типа дата-время
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
