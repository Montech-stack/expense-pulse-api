namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller {
    public function index() {
        // with('category') solves the N+1 problem (Performance Optimization)
        return TransactionResource::collection(Transaction::with('category')->latest()->paginate(10));
    }
    public function store(StoreTransactionRequest $request) {
        $transaction = Transaction::create($request->validated());
        return new TransactionResource($transaction);
    }
}