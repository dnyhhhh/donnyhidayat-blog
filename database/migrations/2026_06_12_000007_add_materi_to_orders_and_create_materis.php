<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2)->default(12000);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // Ubah enum orderable_type agar mendukung 'materi'
        DB::statement("CREATE TABLE orders_new (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            invoice_number TEXT UNIQUE NOT NULL,
            orderable_type TEXT NOT NULL CHECK(orderable_type IN ('ebook','course','materi')),
            orderable_id INTEGER NOT NULL,
            amount REAL NOT NULL,
            status TEXT NOT NULL DEFAULT 'pending' CHECK(status IN ('pending','paid','rejected')),
            payment_proof TEXT,
            paid_at DATETIME,
            created_at DATETIME,
            updated_at DATETIME,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )");
        DB::statement("INSERT INTO orders_new SELECT * FROM orders");
        DB::statement("DROP TABLE orders");
        DB::statement("ALTER TABLE orders_new RENAME TO orders");
    }

    public function down(): void {
        Schema::dropIfExists('materis');
    }
};
