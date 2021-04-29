<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLotteryRequest;

use App\Service\Lottery;

class LotteryController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function store(StoreLotteryRequest $request) {
        try {
            $games = new Lottery($request->quantityGames, $request->quantityDozens);
            $result = $games->initDraw();
        } catch (\Exception $exception) {
            return redirect()->route('home')->withFlashDanger($exception->getMessage());
        }

        return view('result')->with(compact('games', 'result'));
    }
}
