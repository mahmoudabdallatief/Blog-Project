<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    public function index($cat_id = null,$tag = null ,Request $request)
{
    $posts1 =Post::all();
    $cats = Category::with(['subcategory'])->get();
    $subs = SubCategory::with(['post'])->whereIn('id', $posts1->pluck('category_id'))->get();
    if ($request->has('cat_id')) {
        $cat_id = $request->input('cat_id');
    }

    if ($cat_id) {
        $posts = Post::with(['subcategory'])
            ->where('category_id', $cat_id)
            ->orderBy('id', 'asc')
            ->paginate(2);
            if ($posts->isEmpty()) {
                abort(404); // or redirect to a custom 404 page
            }
        return view('back.pages.home', compact('posts','cats'));
    }

    if ($request->has('tag')) {
        $tag = $request->input('tag');
    }
    if ($tag) {
        $posts = Post::with(['subcategory'])
        ->Where('post_tags', 'like', "%{$tag}%")
        ->orderBy('id', 'asc')
        ->paginate(2);
    
        return view('back.pages.home', compact('posts', 'cats'));
    }
    if($request->has('search_query')){

        $searchQuery = trim($request->input('search_query'));
        $posts = Post::with(['subcategory'])->where('post_title', 'like', "%{$searchQuery}%")
        ->orWhere('post_content', 'like', "%{$searchQuery}%")
        ->orderBy('id', 'asc')
        ->paginate(2);
        return view('back.pages.home', compact('posts','cats'));
    }
    $post = Post::with(['subcategory'])
        ->orderBy('id', 'desc')
        ->first();

    $posts = Post::with(['subcategory'])
        ->where('id', '<>', $post->id)
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get();

    $randoms = Post::with(['subcategory'])
        ->where('id', '<>', $post->id)
        ->inRandomOrder()
        ->limit(4)
        ->get();

    return view('back.pages.home', compact('post', 'posts', 'randoms', 'subs' ,'cats'));
}

    public function single($id){

        $posts1 =Post::all();
        $subs = SubCategory::with(['post'])->whereIn('id', $posts1->pluck('category_id'))->get();
        $post = Post::with(['subcategory'])->where('id',$id)
        ->firstOrFail();
        $randoms = Post::with(['subcategory'])
        ->where('id', '<>', $id)
        ->inRandomOrder()
        ->limit(4)
        ->get();

        $posts = Post::with(['subcategory'])
    ->where('category_id', $post->category_id)
    ->where('id', '<>', $id)
    ->limit(3)
    ->orderBy('id','desc')
    ->get();

    
    
    return view('back.pages.single', compact('post', 'randoms', 'subs', 'posts','posts1'));
    }

    public function addpost(){
        $subcategories = SubCategory::all();
        return view('back.pages.addpost', compact('subcategories'));
    }
    public function addnewpost(Request $request){
        $title = $request->input('title');
        $content = strip_tags($request->input('content'));
            $category = $request->input('category');
            $featured_image = $request-> file('featured_image');
            $tags = $request->input('tags');

          
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'featured_image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'tags' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('addpost')->withErrors($validator)->withInput();
        }
        $new_img = md5(uniqid()) . '.' . $featured_image->getClientOriginalExtension();
          
            $featured_image->move(public_path('images'), $new_img);

            Post::insert([
                'author_id'=>session('log'),
                'category_id' => $category,
                'post_title' => $title,
                'post_slug' => $title,
                'post_content' => $content,
                'featured_image' => $new_img,
                'post_tags' => $tags,
                'created_at' => $request->input('currentTimestamp'),
            ]);
            return redirect()->route('allposts')->with('success','The post has been added successfully');

    }
    public function addcomment(Request $request){

        $validator = Validator::make($request->all(), [
            
            'content' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $author_id = session('log');
        $postId = $request->input('post_id');
        $parentId = $request->input('parent_id');
        $content = $request->input('content');
    $reply_id =null;
    $created_at =  $request->input('currentTimestamp');
        Comment::create([
            'post_id' => $postId,
            'parent_id' => $parentId,
            'content' => $content,
            'author_id'=>$author_id,
            'reply_id'=>$reply_id,
            'created_at'=>$created_at,
            'updated_at' =>null
        ]);
    
    }

    public function edit_comment (Request $request){
        $validator = Validator::make($request->all(), [
            
            'content_of_comment' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $content = $request->input('content_of_comment');
        $updated_at =  $request->input('currentTimestamp');
        $id = $request->input('id');
        DB::table('comments')->where('id',$id)->update([
            'content'=>$content,
            'updated_at'=>$updated_at,

        ]);
        return response()->json(2);
    }

    public function editpost($id){
        $post = Post::findOrFail($id);
        $subs = SubCategory::all();
        return view ('back.pages.editpost',compact('post' ,'subs'));
    }
    public function updatepost(Request $request){
        $id = $request->input('id');
        $title = $request->input('title');
        $content = strip_tags($request->input('content'));
            $category = $request->input('category');
            $featured_image = $request-> file('featured_image');
            $tags = $request->input('tags');
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'featured_image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->route('editpost',['id'=>$id])->withErrors($validator)->withInput();
        }
        if($featured_image != NULL){
            $post = Post::findOrFail($id);
        $image = $post -> featured_image;
            $imagePath = public_path('images') . '/' . $image;
    
            if (file_exists($imagePath)) {
                // Delete the image file
                unlink($imagePath);
            }
            $new_img = md5(uniqid()) . '.' . $featured_image->getClientOriginalExtension();
          
            $featured_image->move(public_path('images'), $new_img);
            DB::table('posts')->where('id',$id)->update([

                'featured_image' => $new_img
            ]);

            
        }
        if($tags !=NULL){
            DB::table('posts')->where('id',$id)->update([

                'post_tags' => $tags
            ]);
        }
        DB::table('posts')->where('id',$id)->update([
            'category_id' => $category,
            'post_title' => $title,
            'post_slug' => $title,
            'post_content' => $content,
            'updated_at' => $request->input('currentTimestamp'),
        ]);
        return redirect()->route('allposts')->with('success','The post has been updated successfully');
    }
    

}
