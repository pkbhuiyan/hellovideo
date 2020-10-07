<?php

namespace App\Http\Controllers;

use View;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class CategoryController extends Controller
{
    public function index()
    {
       $value = Category::all();
       return View('pages.category',compact('value'));
    }

    public function store(Request $request)
    {   
        $status = $request->validate([
            'category_name' => 'required|string|max:191',
        ]);            

        
        if($status){
            $data = Category::create([
                'category_name' => $request['category_name']
            ]);
            toastr()->success('Data has been saved successfully!');
            return redirect('/categories');
        }else{
            toastr()->error('An error has occurred please try again later.');
            return back()->withError($exception->getMessage())->withInput();
        }
        
        
       
        
        
        
    }

    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $category = Category::findOrFail($id);
        $category->delete();
        toastr()->success('Deleted !!');
        return redirect('/categories');
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'category_name' => 'required|string|max:191',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        toastr()->success('Data has been updated successfully!');
        return redirect('/categories');
    }

    
    

}
