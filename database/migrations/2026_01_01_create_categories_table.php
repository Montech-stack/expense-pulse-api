public function up(): void {
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->enum('type', ['income', 'expense']);
        $table->timestamps();
    });
}