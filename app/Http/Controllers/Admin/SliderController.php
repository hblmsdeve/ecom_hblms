<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function add()
    {
        return view('admin.slider.add');
    }
    public function insert(Request $request)
    {
        $slider = new Slider();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        $slider->price = $request->input('price');
        $slider->link = $request->input('link');
        $slider->status = $request->input('status') == TRUE?'1':'0';
        $slider->trending = $request->input('trending') == TRUE?'1':'0';
        $slider->save();
        return redirect('admin/sliders')->with('status', "Slider Added Successfully");
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/slider/', $filename);
            $slider->image = $filename;
        }
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        $slider->price = $request->input('price');
        $slider->link = $request->input('link');
        $slider->status = $request->input('status') == TRUE?'1':'0';
        $slider->trending = $request->input('trending') == TRUE?'1':'0';
        $slider->update();
        return redirect('admin/sliders')->with('status', "Slider Updated Successfully");
    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if($slider->image){
            $path = 'assets/uploads/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $slider->delete();
        return redirect('admin/sliders')->with('status', "Slider Deleted Successfully");
    }
}
