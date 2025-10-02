<?php

namespace App\Services\Translator;

use App\Contracts\TranslatorInterface;

class VietnameseTranslator implements TranslatorInterface
{
    public function greeting(): string
    {
        return 'Xin chào, quản trị viên';
    }
}
