<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::select('id','product', 'condition', 'status', 'quantity', 'category', 'price', 'user_id', 'image', 'brand')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->paginate(10);

        foreach($publications as $publication) {
            if($publication->quantity === 0) {
                $publication->status = 0;
                $publication->save();
            }
        }

        foreach($publications as $publication) {
            $publication->image = explode(",", $publication->image);
        }

        return view('admin.publications-index', [
            'publications' => $publications
        ]);
    }

    public function create()
    {
        return view('admin.publications-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product' => 'required|max:75|unique:publications',
            'brand' => 'required|max:25',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'condition' => 'required',
            'description' => 'required|max:300',
            'image' => 'required'
        ]);
         
        $request->user()->publications()->create([
            'product' => $request->product,
            'brand' => $request->brand,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'condition' => $request->condition,
            'description' => $request->description,
            'status' => 1,
            'user_id' => auth()->user()->id,
            'image' => implode(",", $request->image)
        ]);

        return redirect()->route('publications.index')->with('success', 'success');
    }

    public function edit($ignoredUsername = null, $id)
    {
        $id = Crypt::decrypt($id);
        $bdData = Publication::find($id);

        return view('admin.publications-edit', [
            'bdData' => $bdData
        ]);
    }

    public function update(Request $request, $ignoredUsername = null, Publication $publication)
    {
        $this->validate($request, [
            'product' => ['required','max:75','unique:publications,product,'.$publication->id],
            'brand' => 'required|max:25',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'condition' => 'required',
            'description' => 'required|max:300',
            'image' => 'required'
        ]);

        $publication->product = $request->product;
        $publication->brand = $request->brand;
        $publication->category = $request->category;
        $publication->quantity = $request->quantity;
        $publication->price = $request->price;
        $publication->condition = $request->condition;
        $publication->description = $request->description;
        $publication->image = implode(",", $request->image);
        $publication->save();

        return redirect()->route('publications.index', auth()->user()->username)->with('success', 'success');
    }

    public function destroy($ignoredUsername = null, Publication $publication)
    {
        $this->authorize('delete', $publication);

        $imageRoutes = explode(",", $publication->image);
        
        foreach($imageRoutes as $imgRou){
            $image_path = public_path('uploads/').$imgRou;

                if(File::exists($image_path)) {
                    unlink($image_path);              
                }
        }

        $publication->delete();

        return back()->with('delete', 'delete');
    }
}
