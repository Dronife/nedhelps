<?php

use App\Models\Loan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10);
            $table->decimal('interest_rate', 5);
            $table->integer('duration');
            $table->enum('duration_type', [Loan::DURATION_TYPE_YEAR, Loan::DURATION_TYPE_MONTH])->default(Loan::DURATION_TYPE_YEAR);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
