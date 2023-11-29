<?php

namespace App\Http\Controllers;
use App\Rules\EmailWithDot;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index(){

        return view('back.pages.home');

    }

    public function login(){
        if(session('log')){
            return redirect()->route('index');
        }
        $setting = DB::table('settings')->where('id',1)->first();
        return view('back.pages.auth.login', ['setting'=>$setting]);
    }


    public function login_form(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
    
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }
    
        $user = User::where('email', $email)
            ->orWhere('username', $email)
            ->where('password', $password)
            ->first();
    
        if (!$user && filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('login')->with('failed', 'E-mail or Password is not correct');
        }
        if (!$user && !filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('login')->with('failed', 'Username or Password is not correct');
        }
        if ($user->blocked == 1) {
            return redirect()->route('login')->with('failed', 'This account is blocked');
        } else {
            session()->put('log', $user->id);
            return redirect()->route('index');
        }
    }
    
    public function forgot_password(){
        if(session('log')){
            return redirect()->route('index');
        }
        $setting = DB::table('settings')->where('id',1)->first();
        return view('back.pages.auth.forgot', ['setting'=>$setting]);
    }


    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('forgot-password')->withErrors($validator)->withInput();
        }
        $email = $request->email;

        $user = User::where('email', $email)->first();

        if (empty($user)) {
            return redirect()->route('forgot-password')->with('failed', 'E-mail not found');
        }

        $token = sha1(Str::random(60));

        DB::table('password_resets')->insert([
            'email' =>$email,
            'token' =>$token

        ]);

        // Mail::send('back.pages.auth.forgot', ['token' => $token], function ($message) use ($email) {
        //     $message->to($email);
        //     $message->subject('Reset Password');
        // });

        return redirect()->route('reset-form',['token'=>$token])->with('success', 'We have sent you an e-mail with instructions to reset your password');
    }


    public function reset_form(){
        if(session('log')){
            return redirect()->route('index');
        }
        $setting = DB::table('settings')->where('id',1)->first();
        return view('back.pages.auth.reset', ['setting'=>$setting]);
    }


    public function reset_Password(Request $request)
    {
        $email=$request-> email;
        $token = $request->token;
        $password = $request->password;
        $password_confirmation = $request->confirmed_password;
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'confirmed_password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('reset-form',['token'=>$token])->withErrors($validator)->withInput();
        }
       

        $user = DB::table('password_resets')->where('token', $token)->where('email',$email)->first();

        if (empty($user)) {
            return redirect()->route('reset-form',['token'=>$token])->with('failed', 'Invalid Token Or E-mail');
        }

        if ($password != $password_confirmation) {
            return redirect()->route('reset-form',['token'=>$token])->with('failed', 'Password does not match Confirmed Password');
        }

        User::where('email',$email)->update(['password' => md5($password)]);

        DB::table('password_resets')->where('token', $token)->where('email',$email)->delete();

        return redirect()->route('login')->with('success', 'Password reset successfully');
    }


public function profile(){

    $user = User::where('id',session('log'))->first();
    return view('back.pages.profile',['user'=>$user]);

}


public function updateuser(Request $request){

    $name = $request->name;
    $username = $request->username;
    $email = $request->email;
    $biography = $request->biography;
    
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'username' => 'required',
        'email' => ['required', new EmailWithDot()],
        'biography' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect()->route('profile')->withErrors($validator)->withInput();
    }
DB::table('users')->where('id',session('log'))->update([
    'name' =>$name,
    'username' =>$username,
    'email' =>$email,
    'biography' =>$biography,
]);
return redirect()->route('profile')->with('success','Personal-Details updated successfully');
}


public function updatepassword(Request $request){

    $password = $request->input('current_password');
    $new_password = $request->input('new_password');
        $new_confirmed_password = $request->input('new_confirmed_password');
    $validator = Validator::make($request->all(), [
        'current_password' => 'required',
        'new_password' => 'required | min:5 | max:25',
        'new_confirmed_password' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect()->route('profile')->withErrors($validator)->withInput();
    }
    $user = User::where('id',session('log'))->where('password',md5($password))->first();
    if(empty($user)){
        return redirect()->route('profile')->with('failed','Password is Invalid');
    }
    if ($new_password != $new_confirmed_password) {
        return redirect()->route('profile')->with('failed', 'New Password does not match New Confirmed Password');
    }

    DB::table('users')->where('id', session('log'))->update([
        'password' => md5($new_password)
    ]);
    return redirect()->route('profile')->with('success','Password updated successfully');
}

public function changepicture(Request $request){
    $image = $request-> file('image');
    $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    if ($validator->fails()) {
        return redirect()->route('profile')->withErrors($validator)->withInput();
    }
    $new_img_name = md5(uniqid()) . '.' . $image->getClientOriginalExtension();
          
            $image->move(public_path('images'), $new_img_name);
            User::where("id",session('log'))->update([
                'picture' => $new_img_name

            ]);
            return redirect()->route('profile')->with('success','The picture updated successfully');
}

public function settings(){
    return view('back.pages.settings');
}
public function updategeneralsettings(Request $request){
    $name = $request->input('name');
    $email = $request->input('email');
        $des = $request->input('des');
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => ['required', new EmailWithDot()],
        'des' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect()->route('settings')->withErrors($validator)->withInput();
    }
    Setting::where("id",1)->update([
        'name' => $name,
        'email' => $email,
        'des' => $des,

    ]);
    return redirect()->route('settings')->with('success','The general-settings updated successfully');
}

public function updatelogo(Request $request){
    $logo = $request-> file('logo');
    $validator = Validator::make($request->all(), [
        'logo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);
    if ($validator->fails()) {
        return redirect()->route('settings')->withErrors($validator)->withInput();
    }
    $new_img_logo = md5(uniqid()) . '.' . $logo->getClientOriginalExtension();
          
            $logo->move(public_path('images'), $new_img_logo);
            
            Setting::where("id",1)->update([
                'logo' => $new_img_logo

            ]);
            return redirect()->route('settings')->with('success','The logo updated successfully');
}
public function updatesocialmedia(Request $request){
    $facebook = $request->input('facebook');
    $youtube = $request->input('youtube');
        $linkedin = $request->input('linkedin');
        $instegram = $request->input('instegram');

    $validator = Validator::make($request->all(), [
        'facebook' => 'required | url',
        'youtube' => 'required | url',
        'linkedin' => 'required | url',
        'instegram' => 'required | url',
    ]);
 if ($validator->fails()) {
        return redirect()->route('settings')->withErrors($validator)->withInput();
    }
    Social::where("id",1)->update([
        'facebook' => $facebook,
        'youtube' => $youtube,
        'linkedin' => $linkedin,
        'instegram' => $instegram,

    ]);
    return redirect()->route('settings')->with('success','The social media URL updated successfully');

}
public function author(Request $request){
   
if($request->has('search_query')){

    $searchQuery = trim($request->input('search_query'));
    $users = User::with('type')->where('name', 'like', "%{$searchQuery}%")
    ->orWhere('email', 'like', "%{$searchQuery}%")
    ->orWhere('username', 'like', "%{$searchQuery}%")
    ->orderBy('id', 'asc')
    ->paginate(2);
    if(count($users)==0 || empty($searchQuery)){
        $alltypes = Type::all();
        $num ='No Author Found';
        return view('back.pages.author',compact('num','alltypes'));
    }
    
    $alltypes = Type::all();
    
    return view('back.pages.author',compact('users','alltypes'));
}else{
    $users = User::with('type')->where('id','<>', session('log'))->orderBy('id',"desc")->paginate(2);
    if(count($users)==0){
        $alltypes = Type::all();
        $num ='No Author Found';
        return view('back.pages.author',compact('num','alltypes'));
    }
   
    $alltypes = Type::all();
    
    return view('back.pages.author',compact('users','alltypes'));    
    }

   
}
public function addauthor(Request $request)
{
    $name = $request->input('name');
    $username = $request->input('username');
    $email = $request->input('email');
    $type = $request->input('type');
    $direct = $request->input('direct');

    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:users',
        'username' => 'required|unique:users|min:6|max:20',
        'email' => ['required',new EmailWithDot(),'unique:users'],
        'type' => 'required',
        'direct' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    DB::table('users')->insert([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'type' => $type,
        'direct_publish' => $direct,
        'biography' => 'NULL',
        'blocked' => 0,
        'remember_token' => 'NULL',
        'email_verified_at' => null
    ]);

    return response()->json(2);

}


public function updateauthor(Request $request)
{
    $name = $request->input('name_of_author');
    $username = $request->input('username_of_author');
    $email = $request->input('email_of_author');
    $type = $request->input('type_of_author');
    $direct = $request->input('direct_of_author');
    $id =      $request->input('id');
    if ($request->has('my_checkbox')) {
     $block = 1;
    } else {
        $block = 0;
    }

    $validator = Validator::make($request->all(), [
        'name_of_author' => ['required', Rule::unique('users', 'name')->ignore($id)],
        'username_of_author' => ['required',Rule::unique('users', 'username')->ignore($id),'min:6','max:20'],
        'email_of_author' => ['required',new EmailWithDot(),Rule::unique('users', 'email')->ignore($id)],
        'type_of_author' => 'required',
        'direct_of_author' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    DB::table('users')->where('id',$id)->update([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'type' => $type,
        'direct_publish' => $direct,
        'blocked' => $block,
    ]);

    return response()->json(2);

}
public function deleteauthor(Request $request)
{
    $id = $request->input('id');
    $user = User::findOrFail($id);
    $image = $user->picture;
    if($image != NULL){
        $imagePath = public_path('images') . '/' . $image;

        if (file_exists($imagePath)) {
            // Delete the image file
            unlink($imagePath);
        }
    }
        DB::table('users')->where('id', $id)->delete();

        $searchQuery = trim(request()->input('search_query'));

$redirectToPage = (int) request()->input('page', 1); // Default value of 1

if ($searchQuery) {
    $paginator = User::where('name', 'like', "%{$searchQuery}%")
        ->orWhere('email', 'like', "%{$searchQuery}%")
        ->orWhere('username', 'like', "%{$searchQuery}%")
        ->orderBy('id', 'asc')
        ->paginate(2);

    
} else {
    $paginator = User::where('id', '<>', session('log'))->orderBy('id', 'desc')->paginate(2);
    
}
$redirectToPage = ($redirectToPage <= $paginator->lastPage()) ? $redirectToPage : $paginator->lastPage();


if ($searchQuery) {
return redirect()->route('author', [
    'search_query' => $searchQuery,
    'page' => $redirectToPage,
])
    ->with('success', 'The author has been deleted successfully');

}
else{
    return redirect()->route('author', [
        'page' => $redirectToPage,
    ])
        ->with('success', 'The author has been deleted successfully');
}
}

   

    



    public function logout(){
    session()->flush();
    return redirect()->route('login');
}
}
