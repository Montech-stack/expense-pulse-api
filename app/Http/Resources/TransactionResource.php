public function toArray($request): array {
    return [
        'id' => $this->id,
        'amount' => (float) $this->amount,
        'category' => $this->category->name,
        'type' => $this->category->type,
        'description' => $this->description,
        'date' => $this->transaction_date,
    ];
}