<?php

namespace App\Http\Controllers;

use App\Models\FindNumber;
use Illuminate\Http\Request;

class FindNumberController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }

    public function findHiddenNumber(Request $request)
    {
        $request->validate([
            'hiddenNum' => 'required|numeric'
        ]);

        $existingRecord = FindNumber::first();

        if (!$existingRecord) {
            $randomNumber = rand(1, 10);
            $existingRecord = FindNumber::create([
                'hidden' => $randomNumber,
            ]);
        }

        $hiddenNumber = $existingRecord;
        $inputNumber = $request->hiddenNum;
        $errorMsg = '';
        $successMsg = '';
        $step = 0;

        if ($inputNumber == $hiddenNumber->hidden) {
            $successMsg = 'Correct! It is the hidden number.';
            $step = $hiddenNumber->count;
            $hiddenNumber->delete();
        } elseif ($inputNumber > $hiddenNumber->hidden) {
            $errorMsg = 'Please write a lower number.';
            $hiddenNumber->count += 1;
            $hiddenNumber->save();
        } elseif ($inputNumber < $hiddenNumber->hidden) {
            $errorMsg = 'Please write a higher number.';
            $hiddenNumber->count += 1;
            $hiddenNumber->save();
        }

        return redirect()->back()
            ->with('successMsg', $successMsg)
            ->with('errorMsg', $errorMsg)
            ->with('step', $step)
            ->withInput();
    }
}
