namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Returns all categories so the frontend can populate a dropdown
        return response()->json(Category::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name',
            'type' => 'required|in:income,expense'
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);
    }
}