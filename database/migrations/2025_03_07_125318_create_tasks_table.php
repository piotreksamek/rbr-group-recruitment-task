<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Priority;
use App\Enums\Status;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->enum('priority', [Priority::LOW->value, Priority::MEDIUM->value, Priority::HIGH->value])->default(Priority::LOW->value);
            $table->enum('status', [Status::TODO->value, Status::IN_PROGRESS->value, Status::DONE->value])->default(Status::TODO->value);
            $table->date('due_date');
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
