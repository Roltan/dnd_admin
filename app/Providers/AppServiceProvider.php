<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::enforceMorphMap([
            'klass' => \App\Models\Klass::class,
            'sub_klass' => \App\Models\SubKlass::class,
            'races' => \App\Models\Race::class,
            'sub_race' => \App\Models\SubRace::class,
            'feats' => \App\Models\Feat::class,
            'backgrounds' => \App\Models\Background::class,
        ]);
    }
}
