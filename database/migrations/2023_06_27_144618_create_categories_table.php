<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('macro');
            $table->timestamps();

        });
        
        $categories =  [
            [
                'name'=>'auto',
                'macro'=>'motori'
            ],
            [
                'name'=>'moto',
                'macro'=>'motori'
            ],
            [
                'name'=>'nautica',
                'macro'=>'motori'
            ],
            [
                'name'=>'arredamento',
                'macro'=>'immobili'
            ],
            [
                'name'=>'case/appartamenti',
                'macro'=>'immobili'
            ],
            [
                'name'=>'terreni agricoli',
                'macro'=>'immobili'
            ],
            [
                'name'=>'abbigliamento',
                'macro'=>'market'
            ],
            [
                'name'=>'elettronica',
                'macro'=>'market'
            ],
            [
                'name'=>'collezionismo',
                'macro'=>'market'
            ],
            [
                'name'=>'sport',
                'macro'=>'market'
            ],

        ];

        foreach ($categories as $category) {
            Category::create(['name'=>$category['name'], 'macro'=>$category['macro']]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
