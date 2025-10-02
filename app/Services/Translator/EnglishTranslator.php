<?php

namespace App\Services\Translator;

use App\Contracts\TranslatorInterface;

class EnglishTranslator implements TranslatorInterface
{
    public function greeting(): string
    {
        return 'Hello, admin';
    }
}
