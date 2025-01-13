<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DirectionController extends Controller
{
    public function index()
    {
        $allDirections = Direction::where('user_id', auth()->user()->id)
            ->orderBy('is_default', 'desc')
            ->paginate(5);
        
        return view('admin.directions-index', [
            'allDirections' => $allDirections
        ]);
    }

    public function create()
    {
        return view('admin.directions-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'direction_line_1' => 'required|max:100',
            'direction_line_2' => 'required|max:100',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required'
        ]);

        if($request->is_default == 1) {
            Direction::query()
            ->where([
                'is_default' => 1,
                'user_id' => auth()->user()->id
            ])
            ->update(['is_default' => 0]);
        }

        $request->user()->directions()->create([
            'direction_line_1' => $request->direction_line_1,
            'direction_line_2' => $request->direction_line_2,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'user_id' => auth()->user()->id,
            'is_default' => $request->is_default
        ]);

        return redirect()->route('directions.index', auth()->user()->username)->with('success', 'success');
    }

    public function edit($ignoredUsername = null, $id)
    {
        $id = Crypt::decrypt($id);
        $bdData = Direction::find($id);

        return view('admin.directions-edit', [
            'bdData' => $bdData
        ]);
    }

    public function update(Request $request, $ignoredUsername = null, Direction $direction)
    {
        $this->validate($request, [
            'direction_line_1' => 'required|max:100',
            'direction_line_2' => 'required|max:100',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required'
        ]);

        if($request->is_default == 1) {
            Direction::query()
            ->where([
                'is_default' => 1,
                'user_id' => auth()->user()->id
            ])
            ->where('id', '<>', $direction->id)
            ->update(['is_default' => 0]);
        }

        $direction->direction_line_1 = $request->direction_line_1;
        $direction->direction_line_2 = $request->direction_line_2;
        $direction->country = $request->country;
        $direction->state = $request->state;
        $direction->city = $request->city;
        $direction->zip_code = $request->zip_code;
        $direction->is_default = $request->is_default;
        $direction->save();

        return redirect()->route('directions.index', auth()->user()->username)->with('success', 'success');
    }

    public function destroy($ignoredUsername = null, Direction $direction)
    {
        $this->authorize('delete', $direction);

        $direction->delete();

        return back()->with('delete', 'delete');
    }
}
