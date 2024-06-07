<?php

namespace App\Http\Controllers;

use App\Models\RandomNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RandomNumbersController extends Controller
{
    public function generate()
    {
        $randomNumber = new RandomNumber();
        $randomNumber->number = rand();
        $randomNumber->save();

        return response()->json([
            'id' => $randomNumber->id,
            'number' => $randomNumber->number
        ]);
    }

    public function retrieve($id)
    {

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:random_numbers,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $randomNumber = RandomNumber::find($id);

        if ($randomNumber) {
            return response()->json($randomNumber);
        } else {
            return response()->json([
                'error' => 'Random number not found'
            ], 404);
        }
    }
}
