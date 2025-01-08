public function rules(): array {
    return [
        'category_id' => 'required|exists:categories,id',
        'amount' => 'required|numeric|min:0.01',
        'description' => 'nullable|string|max:255',
        'transaction_date' => 'required|date|before_or_equal:today',
    ];
}