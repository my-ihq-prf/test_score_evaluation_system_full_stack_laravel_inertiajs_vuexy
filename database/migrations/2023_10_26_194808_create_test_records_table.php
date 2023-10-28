<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_records', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->unique();
            $table->date('date');
            $table->string('location');
            $table->integer('grade')->nullable();
            $table->bigInteger('responsible_manager_id');
            $table->boolean('is_gradable')->default(false);
            $table->foreignIdFor(User::class)
                ->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_records');
    }
};
