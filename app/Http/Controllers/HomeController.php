<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\TranslatorInterface;

class HomeController extends Controller
{
    protected TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function index()
    {
        return $this->translator->greeting();
    }
}
