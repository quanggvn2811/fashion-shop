<?php

namespace App\Providers;

use App\Models\Category;

use App\Models\Brand;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\ServiceProvider;

use Illuminate\Http\Request;

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
    public function boot(Request $request)
    {
        $data['url'] = url()->current(); // for loading layout
        $data['catelist'] = Category::where('display', '=', '1')->get();
        $data['brandlist'] = Brand::where('display', '=', 1)->get();

        view()->share($data);
    }
}
