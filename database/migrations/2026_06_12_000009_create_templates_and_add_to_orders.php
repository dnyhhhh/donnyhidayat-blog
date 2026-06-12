<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    public function up(): void {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('tech_stack')->nullable(); // e.g. "Laravel, Tailwind CSS"
            $table->string('preview_url')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('price')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        DB::statement("CREATE TABLE orders_template_tmp (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            invoice_number TEXT UNIQUE NOT NULL,
            orderable_type TEXT NOT NULL CHECK(orderable_type IN ('ebook','course','materi','bundle','template')),
            orderable_id INTEGER NOT NULL,
            amount REAL NOT NULL,
            status TEXT NOT NULL DEFAULT 'pending' CHECK(status IN ('pending','paid','rejected')),
            payment_proof TEXT,
            paid_at DATETIME,
            created_at DATETIME,
            updated_at DATETIME,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )");
        DB::statement("INSERT INTO orders_template_tmp SELECT * FROM orders");
        DB::statement("DROP TABLE orders");
        DB::statement("ALTER TABLE orders_template_tmp RENAME TO orders");
    }

    public function down(): void {}
};
