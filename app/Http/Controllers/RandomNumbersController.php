<?php

namespace App\Http\Controllers;

use App\Models\RandomNumber;
use Illuminate\Http\Request;

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

        if (!is_numeric($id) || intval($id) != $id) {
            return response()->json([
                'error' => 'Invalid ID'
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
