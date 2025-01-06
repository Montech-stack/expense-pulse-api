public function up(): void {
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        // Foreign key linking to categories
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 12, 2);
        $table->enum('type', ['income', 'expense']);
        $table->string('description')->nullable();
        $table->date('transaction_date');
        $table->timestamps();
    });
}