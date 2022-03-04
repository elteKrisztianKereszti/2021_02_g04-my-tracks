<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransposerController extends Controller
{
    protected $keys = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','H'];

    public function index() {
        return view('transposer.transposer');
    }

    public function transpose(Request $request) {
        $request->validate([
            'key' => [ Rule::in($this->keys), 'required' ],
            'distance' => 'numeric|required'
        ]);

        $newKey = $this->doTranspose($request->post('key'), $request->post('distance'));
        return view('transposer.transposer', ['newKey' => $newKey]);
    }

    function doTranspose(string $key, int $distance): string {
        $pos = array_search($key, $this->keys);
        $newPos = ($pos + $distance) % 12;
        return $this->keys[$newPos];
      }
}
