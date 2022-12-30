<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Food;
use App\Ingredient;
use App\Recipe;
use App\User;
use App\Photo;
use App\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('/dashboard', function(){
        $users = User::get();
        return view('admin.dashboard', [
            'users' => $users,
        ]);
    });

});

Route::get('/ingredients/{id}', function ($id) {
	$ingredients = Ingredient::get();
    if($id == 'admin'){
        return view('ingredient/index', [
			'ingredients' => $ingredients
		]);
    }else{
        return redirect('/ingredients/user')->with('status', 'You are Not Allowed to Admin');
    }
});

Route::get('/ingredients/{id}', function ($id) {
    $users = User::where('usertype' , $id)->get();
	$ingredients = Ingredient::get();
    return view('ingredient/index', [
        'ingredients' => $ingredients
    ]);
});

Route::get('/ingredients/update/{id}/{id2}', function ($id,$id2) {
	if($id2 == 'admin'){
		$ingredients = Ingredient::where('id' , $id)->get();
		return view('ingredient/edit', [
			'ingredients' => $ingredients
		]);
	}else{
		return redirect('/ingredients/user')->with('status', 'You are Not Allowed to Admin');
	}	
});

Route::get('/ingredients/{id}/new', function ($id, Request $req) {
	$ingredients = Ingredient::get();
    if($id == 'admin'){
        return view('ingredient/new', [
			'ingredients' => $ingredients
		]);
    }else{
        return redirect('/ingredients/user')->with('status', 'You are Not Allowed to Admin');
    }
});

Route::post('/ingredient/new', function (Request $req) {
	$ingredient = new Ingredient;
	$ingredient->name = $req->nama;
	$ingredient->save();
	
	$ingredients = Ingredient::get();
    return redirect('ingredients/admin');
});

Route::post('/ingredients/updates/{id}', function ($id, Request $req) {
	$ingredient = Ingredient::find($id);
	$ingredient->name = $req->name;
	$ingredient->save();
	
	$ingredients = Ingredient::get();
    return redirect('ingredients/admin');
});

Route::delete('/ingredients/delete/{id}/{id2}', function ($id,$id2) {
	if($id2 == 'admin'){
		Ingredient::findOrFail($id)->delete();
		return redirect("/ingredients/admin");
	}else{
		return redirect('ingredients/user')->with('status', 'You are Not Allowed to Admin');
	}
		
});
Route::get('/foods/{id}', function ($id) {
    $users = User::where('usertype' , $id)->get();
    $foods = Food::get();
	$photos = Photo::get();
    return view('food/index', [
        'users' => $users,
        'foods' => $foods,
		'photos' => $photos,
    ]);
});

Route::get('/foods/{id1}/{id2}/new', function ($id1, $id2) {
    $users = User::where('id', $id1)->get();
    if($id2 == 'admin'){
        return view('food/new', [
			'users' => $users,
		]);
    }else{
        return redirect('/foods/user')->with('status', 'You are Not Allowed to Admin');
    }
});

Route::get('/updates/{id1}/{id2}/{id3}', function ($id1, $id2, $id3) {
    $users = User::where('id', $id2)->get();
	$foods = Food::where('id', $id3)->get();
    if($id1 == 'admin'){
        return view('food/edit', [
			'foods' => $foods
		]);
    }else{
        return redirect('/foods/user')->with('status', 'You are Not Allowed to Admin');
    }
});
Route::delete('/recipe/delete/{id}/{id2}', function ($id,$id2) {
	Recipe::findOrFail($id)->delete();
	return redirect("/recipes/admin/$id2");
});

Route::delete('/food/delete/{id}/{id2}', function ($id,$id2) {
	if($id2 == 'admin'){
		Food::findOrFail($id)->delete();
		return redirect("/foods/admin");
	}else{
		return redirect('/foods/user')->with('status', 'You are Not Allowed to Admin');
	}
});


Route::put('foods/updates/{id1}', function($id, Request $request){

	$file = $request->file('file');
	$food = Food::find($id);
	$food->price = $request->price;
	$food->save();
	
    $tujuan_upload = 'data_file';
    $nama_file = time()."_".$file->getClientOriginalName();
	$file->move($tujuan_upload,$nama_file);
	
	
	$photo = Photo::where('food_id',$id)->first();
    if($photo != null){
        $photo->file = $nama_file;
        $photo->save();
    }else{
        $photos = new Photo;
        $photos->food_id = $id;
        $photos->file = $nama_file;
        $photos->save();
        
    }
	
    return redirect('/foods/admin');
	
});

Route::post('/foods/{id}/new', function($id, Request $req){
	$file = $req->file('file');
	
    $food = new Food;
	$food->name = $req->nama;
	$food->price = $req->harga;
	$food->save();
	
	$tujuan_upload = 'data_file';
	$nama_file = time()."_".$file->getClientOriginalName();
	$file->move($tujuan_upload,$nama_file);
	
	$photo = new Photo;
	$photo->food_id = $food->id;
	$photo->file = $nama_file;
	$photo->save();
	
    return redirect('foods/admin');
});

Route::post('/recipes/{id}/new', function($id, Request $req){
	
	$recipe = new Recipe;
	$recipe->food_id = $id;
	$recipe->ingredient_id = $req->ingredient_id;
	$recipe->qty = $req->qty;
	$recipe->save();
	
    $foods = Food::where('id', $id)->get();
    $recipes = Recipe::where('food_id', $id)->get();
    $ingredients = Ingredient::get();
    return view('recipe/index', [
        'foods' => $foods,
        'recipes' => $recipes,
        'ingredients' => $ingredients,
    ]);
});

Route::get('/updates/{id}',function($id){
	$foods = Food::where('id', $id)->get();
	return view('food/edit', [
		'foods' => $foods,
	]);
});

Route::get('/recipe/update/{id}/{id2}/{id3}',function($id,$id2,$id3){
	$recipes = Recipe::where('id', $id)->get();
	$foods = Food::where('id', $id2)->get();
	$ingredients = Ingredient::where('id', $id3)->get();
	
	return view('recipe/edit', [
		'foods' => $foods,
		'recipes' => $recipes,
		'ingredients' => $ingredients
	]);
});

Route::get('/recipes/admin/{id}', function($id){
    $foods = Food::where('id', $id)->get();
    $recipes = Recipe::where('food_id', $id)->get();
    $ingredients = Ingredient::get();
    return view('recipe/index', [
        'foods' => $foods,
        'recipes' => $recipes,
        'ingredients' => $ingredients,
    ]);
});

Route::post('recipe/{id1}/updates/{id2}', function($id1, $id2, Request $request){
	$recipe = Recipe::find($id2);
	$recipe->qty = $request->qty;
	$recipe->save();
    $foods = Food::where('id', $id1)->get();
	$recipes = Recipe::where('food_id', $id1)->get();
	$ingredients = Ingredient::get();
    return view('recipe/index', [
        'foods' => $foods,
        'recipes' => $recipes,
        'ingredients' => $ingredients,
    ]);
	
});

Route::get('/recipe/admin/{id}/new', function($id){
    $foods = Food::where('id', $id)->get();
    $ingredients = Ingredient::get();
    return view('recipe/new', [
        'ingredients' => $ingredients,
        'foods' => $foods,
    ]);
});


Route::get('/recipe/{id1}/{id2}', function($id1, $id2){
    $foods = Food::where('id', '$id1')->get();
    $ingredients = Ingredient::where('id', '$id2')->get();

    return view('recipe/{id}', [
        'foods' => $foods,
        'ingredients' => $ingredients,
    ]);
});

Route::post('/foods', function (Request $req) {
    //
});

Route::get('/carts', function () {
    $carts = Cart::get();
        return view('cart/order', [
            'carts' => $carts,
    ]);
});

Route::get('/cart/{id}/new', function ($id) {
    $users = User::where('id',$id)->get();
    $foods = Food::get();
        return view('cart/order', [
            'users' => $users,
            'foods' => $foods
    ]);
});

Route::post('/carts/{id}', function ($id, Request $req) {
    
	$cart = new Cart;
    $cart->food_id = $req->food_id;
    $cart->user_id = $id;
    $cart->jumlah = $req->jumlah;
	$cart->save();
    
	return redirect('/cart/'.$id.'/new');
});

Route::delete('/carts/delete/{id1}/{id2}', function ($id1, $id2) {
    $carts = Cart::where('cart_id', $id1);
    $carts->delete();
	return redirect('/carts/order/'.$id2);
});

Route::get('/carts/order/{id}', function ($id) {
    $carts = Cart::where('user_id',$id)->get();
        return view('cart/cart', [
            'carts' => $carts,
    ]);
});
