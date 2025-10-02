<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\TranslatorInterface;
use App\Services\Translator\VietnameseTranslator;
use App\Services\Translator\EnglishTranslator;

class TranslatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TranslatorInterface::class, function ($app) {
            $locale = config('app.locale');

            return match ($locale) {
                'vi' => new VietnameseTranslator(),
                'en' => new EnglishTranslator(),
                default => new EnglishTranslator(),
            };
        });
    }

    public function boot()
    {
        //
    }
}
