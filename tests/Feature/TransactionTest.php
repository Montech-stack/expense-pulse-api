namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_transactions()
    {
        $response = $this->getJson('/api/transactions');
        $response->assertStatus(200);
    }

    public function test_can_create_transaction()
    {
        $category = Category::create(['name' => 'Tech', 'type' => 'expense']);

        $response = $this->postJson('/api/transactions', [
            'category_id' => $category->id,
            'amount' => 500,
            'transaction_date' => now()->format('Y-m-d'),
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('transactions', ['amount' => 500]);
    }
}