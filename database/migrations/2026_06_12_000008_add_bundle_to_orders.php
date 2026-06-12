<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        DB::statement("CREATE TABLE orders_bundle_tmp (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            invoice_number TEXT UNIQUE NOT NULL,
            orderable_type TEXT NOT NULL CHECK(orderable_type IN ('ebook','course','materi','bundle')),
            orderable_id INTEGER NOT NULL,
            amount REAL NOT NULL,
            status TEXT NOT NULL DEFAULT 'pending' CHECK(status IN ('pending','paid','rejected')),
            payment_proof TEXT,
            paid_at DATETIME,
            created_at DATETIME,
            updated_at DATETIME,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )");
        DB::statement("INSERT INTO orders_bundle_tmp SELECT * FROM orders");
        DB::statement("DROP TABLE orders");
        DB::statement("ALTER TABLE orders_bundle_tmp RENAME TO orders");
    }

    public function down(): void {}
};
