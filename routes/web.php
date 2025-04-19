<?php

use Illuminate\Support\Facades\Route;


Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});

//website routes
Route::get('/', [App\Http\Controllers\WebsiteController::class, 'Home'])->name('/');
Route::get('Home', [App\Http\Controllers\WebsiteController::class, 'Home'])->name('Home');
Route::get('home', [App\Http\Controllers\WebsiteController::class, 'Home'])->name('home');
Route::get('Recipes', [App\Http\Controllers\WebsiteController::class, 'recipes'])->name('recipes');
Route::get('Recipes+Details/{slug}', [App\Http\Controllers\WebsiteController::class, 'recipe_detail'])->name('recipe_detail');
Route::get('Activities', [App\Http\Controllers\WebsiteController::class, 'activities'])->name('activities');
Route::get('Veggie+Facts+Benefits', [App\Http\Controllers\WebsiteController::class, 'veggie_facts_benefits'])->name('veggie_facts_benefits');
Route::get('Resources', [App\Http\Controllers\WebsiteController::class, 'resources'])->name('resources');
Route::get('Blogs', [App\Http\Controllers\WebsiteController::class, 'blogs'])->name('blogs');
Route::get('Blog+Detail/{slug}', [App\Http\Controllers\WebsiteController::class, 'blog_detail'])->name('blog_detail');
Route::get('Contact+Us', [App\Http\Controllers\WebsiteController::class, 'contactus'])->name('contactus');
Route::post('save_contact_message', [App\Http\Controllers\WebsiteController::class, 'save_contact_message'])->name('save_contact_message');


Route::get('Register', [App\Http\Controllers\WebsiteController::class, 'register'])->name('register');
Route::post('save_register_user', [App\Http\Controllers\WebsiteController::class, 'save_register_user'])->name('save_register_user');

Route::get('Forgot+Password', [App\Http\Controllers\WebsiteController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('resetpassword', [App\Http\Controllers\WebsiteController::class, 'resetpassword'])->name('resetpassword');

Route::get('Login', [App\Http\Controllers\WebsiteController::class, 'login'])->name('login');
Route::post('customerlogin', [App\Http\Controllers\WebsiteController::class, 'customerlogin'])->name('customerlogin');

Route::name('user.')->prefix('user')->group(function () {

    Route::get('/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return "Cleared!";
    });

    Route::middleware(['user-auth'])->group(function () {
        Route::get('/User+Dashboard', [App\Http\Controllers\WebsiteController::class, 'userdashboard'])->name('userdashboard');
        Route::get('/userlogout', [App\Http\Controllers\WebsiteController::class, 'userlogout'])->name('userlogout');
        Route::get('Profile', [App\Http\Controllers\WebsiteController::class, 'profile'])->name('profile');
        Route::post('/updateuserprofile', [App\Http\Controllers\WebsiteController::class, 'updateuserprofile'])->name('updateuserprofile');
        Route::get('/add_to_wislist/{id}', [App\Http\Controllers\WebsiteController::class, 'add_to_wislist'])->name('add_to_wislist');
        Route::get('/Wishlist+History', [App\Http\Controllers\WebsiteController::class, 'wishlist'])->name('wishlist');
        Route::get('Quiz', [App\Http\Controllers\WebsiteController::class, 'quiz'])->name('quiz');
        Route::post('savequiz', [App\Http\Controllers\WebsiteController::class, 'savequiz'])->name('savequiz');
        Route::get('Quiz+History', [App\Http\Controllers\WebsiteController::class, 'quizhistory'])->name('quizhistory');

    });

});

Route::name('admin.')->prefix('admin')->group(function () {

    Route::get('/clear', function () {

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        return "Cleared!";

    });

//    without login
    Route::match(['get', 'post'], '/login', [App\Http\Controllers\LoginController::class, 'adminLogin'])->name('login');

    Route::middleware(['admin-auth', 'user-access:admin'])->group(function () {

//    After Login
        Route::get('/', [App\Http\Controllers\AdminHomeController::class, 'Dashboard'])->name('/');
        Route::get('/dashboard', [App\Http\Controllers\AdminHomeController::class, 'Dashboard'])->name('dashboard');
        Route::get('/home', [App\Http\Controllers\AdminHomeController::class, 'Dashboard'])->name('home');
        Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

        // Admin Profile
        Route::get('/AdminProfile', [App\Http\Controllers\AdminHomeController::class, 'AdminProfile'])->name('AdminProfile');
        Route::post('/updateprofile', [App\Http\Controllers\AdminHomeController::class, 'updateprofile'])->name('updateprofile');

        // Application Setting
        Route::get('/setting', [App\Http\Controllers\SettingController::class, 'setting'])->name('setting');
        Route::post('/updatesetting', [App\Http\Controllers\SettingController::class, 'updatesetting'])->name('updatesetting');

        // users
        Route::get('/UsersList', [App\Http\Controllers\UsersController::class, 'UsersList'])->name('UsersList');
        Route::get('/AddUsers', [App\Http\Controllers\UsersController::class, 'AddUsers'])->name('AddUsers');
        Route::post('/saveuserrecord', [App\Http\Controllers\UsersController::class, 'saveuserrecord'])->name('saveuserrecord');
        Route::get('/deleteuser/{id}', [App\Http\Controllers\UsersController::class, 'deleteuser'])->name('deleteuser');
        Route::get('/edituser/{id}', [App\Http\Controllers\UsersController::class, 'edituser'])->name('edituser');
        Route::get('/user+details+history/{id}', [App\Http\Controllers\UsersController::class, 'userdetailshistory'])->name('userdetailshistory');
        Route::post('/updateuserrecord', [App\Http\Controllers\UsersController::class, 'updateuserrecord'])->name('updateuserrecord');

        // Categories
        Route::get('/Categories', [App\Http\Controllers\Lookups::class, 'Categories'])->name('Categories');
        Route::post('/savecategories', [App\Http\Controllers\Lookups::class, 'savecategories'])->name('savecategories');
        Route::post('/updatecategories', [App\Http\Controllers\Lookups::class, 'updatecategories'])->name('updatecategories');
        Route::get('/deletecategory/{id}', [App\Http\Controllers\Lookups::class, 'deletecategory'])->name('deletecategory');


        /**** Manage Blogs *****/
        Route::get('/addblogs', [App\Http\Controllers\BlogsController::class, 'addblogs'])->name('addblogs');
        Route::post('/saveblogs', [App\Http\Controllers\BlogsController::class, 'saveblogs'])->name('saveblogs');
        Route::get('/blogslist', [App\Http\Controllers\BlogsController::class, 'blogslist'])->name('blogslist');
        Route::get('/deleteblog/{id}', [App\Http\Controllers\BlogsController::class, 'deleteblog'])->name('deleteblog');
        Route::get('/editblog/{id}', [App\Http\Controllers\BlogsController::class, 'editblog'])->name('editblog');
        Route::post('/updateblogs', [App\Http\Controllers\BlogsController::class, 'updateblogs'])->name('updateblogs');


        /**** Manage Products *****/
        Route::get('/Add+Products', [App\Http\Controllers\ProductsController::class, 'addproducts'])->name('addproducts');
        Route::post('/saveproducts', [App\Http\Controllers\ProductsController::class, 'saveproducts'])->name('saveproducts');
        Route::get('/Products+list', [App\Http\Controllers\ProductsController::class, 'productslist'])->name('productslist');
        Route::get('/deleteproduct/{id}', [App\Http\Controllers\ProductsController::class, 'deleteproduct'])->name('deleteproduct');
        Route::get('/editproduct/{id}', [App\Http\Controllers\ProductsController::class, 'editproduct'])->name('editproduct');
        Route::post('/updateproducts', [App\Http\Controllers\ProductsController::class, 'updateproducts'])->name('updateproducts');


        /**** Manage Quiz *****/
        Route::get('/Manage+Quiz', [App\Http\Controllers\QuizController::class, 'managequiz'])->name('managequiz');
        Route::post('/savequizquestionoptions', [App\Http\Controllers\QuizController::class, 'savequizquestionoptions'])->name('savequizquestionoptions');
        Route::post('/updatequizquestionoption', [App\Http\Controllers\QuizController::class, 'updatequizquestionoption'])->name('updatequizquestionoption');
        Route::get('/deletequestion/{id}', [App\Http\Controllers\QuizController::class, 'deletequestion'])->name('deletequestion');

        /**** Veggi of month *****/
        Route::get('/Veggi+Of+Month', [App\Http\Controllers\ProductsController::class, 'veggiofmonth'])->name('veggiofmonth');
        Route::post('/updatevog', [App\Http\Controllers\ProductsController::class, 'updatevog'])->name('updatevog');

        /**** Manage Contact Us ****/
        Route::get('/Contact+Messages', [App\Http\Controllers\AdminHomeController::class, 'contact_messages'])->name('contact_messages');
        Route::get('/delete_contact_message/{id}', [App\Http\Controllers\AdminHomeController::class, 'delete_contact_message'])->name('delete_contact_message');


    });
});

use App\Http\Controllers\WebsiteController;
Route::get('/weekly-veggie-fact', [WebsiteController::class, 'weeklyVeggieFact']);


Route::get('/quiz/results', [WebsiteController::class, 'quizResults'])->name('user.quiz.results');
Route::get('/activities', [WebsiteController::class, 'activities'])->name('user.activities');
Route::post('/submit-puzzle', [WebsiteController::class, 'submitPuzzle'])->name('user.puzzle.submit');
?>
