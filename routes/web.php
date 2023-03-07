<?php



use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AddProductsController;
use App\Http\Controllers\admin\AddGalleriesController;
use App\Http\Controllers\admin\AddBlogsController;
use App\Http\Controllers\CartsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');

// });
Route::get('/', function () {
    return view('content');

});

//user side route start here
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{id}/Productdetails', [HomeController::class, 'show']);


// Route::get('/shop', function () {
//     return view('shop');

// });
Route::get('/shop', [HomeController::class, 'show']);
Route::get('/gallery', [HomeController::class, 'gallery']);
Route::get('/blog', [HomeController::class, 'blog']);



// Route::get('/details', function () {
//     return view('details');

// });
Route::get('/contact', function () {
    return view('contact');

});
//view product details routing

Route::get("/", [ProductDetailsController::class, 'index']);
Route::get('/Productdetails/{id}', [ProductDetailsController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//add to cart routing
//Route::get("/", [CartController::class, "index"]);
Route::post("/Productdetails/{id}", [CartsController::class, "store"]);
Route::get("/showcart", [CartsController::class, "show"]);
Route::get("/showcart/{id}", [CartsController::class, "destroy"]);



//admin side routes
//add product routing here
Route::get('/addproducts', [AddProductsController::class, 'index']);
Route::post('/addproducts', [AddProductsController::class, 'store']);
Route::get('/manageproducts', [AddProductsController::class, 'show']);
Route::get("/manageproducts/{id}", [AddProductsController::class, "destroy"]);
Route::get("/editproducts/{id}", [AddProductsController::class, "edit"]);
Route::post("/editproducts/{id}", [AddProductsController::class, "update"]);

//add gallery routing here

Route::get('/addgallery', [AddGalleriesController::class, 'index']);
Route::post('/addgallery', [AddGalleriesController::class, 'store']);
Route::get('/managegallery', [AddGalleriesController::class, 'show']);
Route::get("/managegallery/{id}", [AddGalleriesController::class, "destroy"]);
Route::get("/editgallery/{id}", [AddGalleriesController::class, "edit"]);
Route::post("/editgallery/{id}", [AddGalleriesController::class, "update"]);

//add blog routing here

Route::get('/addblogs', [AddBlogsController::class, 'index']);
Route::post('/addblogs', [AddBlogsController::class, 'store']);
Route::get('/manageblog', [AddBlogsController::class, 'show']);
Route::get("/manageblog/{id}", [AddBlogsController::class, "destroy"]);
Route::get("/editblog/{id}", [AddBlogsController::class, "edit"]);
Route::post("/editblog/{id}", [AddBlogsController::class, "update"]);







// Route::get('/', function () {
//     return view('content');

// });



require __DIR__ . '/auth.php';