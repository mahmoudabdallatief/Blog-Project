<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;
class categoryController extends Controller
{
    public function index(){
        $categories = Category::with(['subcategory'])
        ->orderBy('id', 'asc')
        ->get();
        $subs = SubCategory::with(['category','post'])
        ->orderBy('id', 'asc')
        ->get();
        return view('back.pages.cat', compact('categories','subs'));
    }
    public function addcat(Request $request){
        $name = $request->input('category_name');
    
    
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories',
           
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        DB::table('categories')->insert([
            'category_name' => $name,
        ]);
    
        return response()->json(2);
    
    }
    public function updatecat(Request $request){

        $name = $request->input('name_of_category');
    
        $id = $request->input('id');

        $validator = Validator::make($request->all(), [
            'name_of_category' => ['required',Rule::unique('categories', 'category_name')->ignore($id)],
           
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        DB::table('categories')->where('id',$id)->update([
            'category_name' => $name,
        ]);
    
        return response()->json(2);
    }
    public function deletecat(Request $request){

        $id = $request->input('id');
      $sub =  DB::table('sub_categories')->where('parent_Category', $id)->get();
        if(count($sub)>0){
            return redirect()->route('category')->with('failed','The category can\'t deleted because it is used !!');
        }
        else{
            DB::table('categories')->where('id', $id)->delete();

            return redirect()->route('category')->with('success','The category has been deleted successfully');
        }
       

    }
    public function addsub(Request $request){
        $name = $request->input('subcategory_name');
    
        $parent = $request->input('parent_Category');

        $validator = Validator::make($request->all(), [
            'subcategory_name' => 'required|unique:sub_categories',
            'parent_Category' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        DB::table('sub_categories')->insert([
            'subcategory_name' => $name,
            'parent_Category' => $parent,
            'slug' =>$name
        ]);
    
        return response()->json(2);

       }
       public function updatesub(Request $request){

        $name = $request->input('name_of_subcategory');
        $parent = $request->input('parent_of_Category');
        $id = $request->input('id');

        $validator = Validator::make($request->all(), [
            'name_of_subcategory' => ['required',Rule::unique('sub_categories', 'subcategory_name')->ignore($id)],
            'parent_of_Category' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        DB::table('sub_categories')->where('id',$id)->update([
            'subcategory_name' => $name,
            'parent_Category' => $parent,
            'slug' =>$name
        ]);
    
        return response()->json(2);
       }
       public function deletesub(Request $request){

        $id = $request->input('id');
        $post =  DB::table('posts')->where('category_id', $id)->get();
        if(count($post)>0){
            return redirect()->route('category')->with('failed','The subcategory can\'t deleted because it is used !!');
        }
        else{
            DB::table('sub_categories')->where('id', $id)->delete();

            return redirect()->route('category')->with('success','The subcategory has been deleted successfully');
        }
        
        

    }
}

