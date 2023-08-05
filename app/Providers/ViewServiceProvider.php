<?php
 
namespace App\Providers;
 
use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // ...
    }
    public function boot(): void
    {
        //  View::composer('layout.header1',MenuComposer::class); // Truyền CSDL Menu vào file Header1
    }
}