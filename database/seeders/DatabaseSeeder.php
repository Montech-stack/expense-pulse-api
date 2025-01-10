namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Salary', 'type' => 'income'],
            ['name' => 'Food', 'type' => 'expense'],
            ['name' => 'Rent', 'type' => 'expense'],
            ['name' => 'Freelance', 'type' => 'income'],
        ];

        foreach ($categories as $cat) {
            $category = Category::create($cat);

            // Create 5 random transactions for each category
            Transaction::create([
                'category_id' => $category->id,
                'amount' => rand(100, 1000),
                'description' => 'Sample ' . $cat['name'] . ' entry',
                'transaction_date' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}