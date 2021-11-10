<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {


        return Inertia::render('Welcome', [
            'items' => Item::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => ['required']]);

        Item::updateOrCreate(['id' => $request->id], $data);

        return redirect()->back();
    }

    public function isCompleted($id, Request $request)
    {

        $item = Item::find($id);

        if ($item) {
            $item->completed = true;
            $item->completed_at = Carbon::now();
            $item->save();

        }
        return back();

    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if ($item) {
            $item->delete();
        }
        return back();

    }
}
