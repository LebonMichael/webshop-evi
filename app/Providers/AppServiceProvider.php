<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        $this->user = User::count();
        $this->order = Order::count();
        $this->product = Product::count();
        $this->post = Post::count();
        view()->composer('layouts.admin', function($view) {
            $view->with([
                'user' => $this->user,
                'product' => $this->product,
                'order' => $this->order,
                'post' => $this->post,
            ]);
        });

    }
}
