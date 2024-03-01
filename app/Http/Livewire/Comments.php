<?php

namespace App\Http\Livewire;
use DateTime;
use DateTimeZone;
use Livewire\Component;
use App\Models\Comment;
class Comments extends Component
{
    public $postId;
    public $comments = [];
    public $content ='';
    public $parentId ; 
    public $replyId ;
  
  
    
    public function __construct($postId)
{
    $this->postId = $postId;
}
    public function mount($postId)
    {
      
        $this->fetchComments();
    }

    public function fetchComments()
    {
        

        $comments = Comment::with('replies','user','reply_to')->where('post_id',$this->postId)->whereNull('parent_id')->whereNull('reply_id')->orderBy('id','desc')->get();

        $this->comments = $comments->map(function ($comment) {
            $commentArray = $comment->toArray();
            $commentArray['replies'] = $comment->replies->toArray();
            $commentArray['user'] = $comment->user ;
            $commentArray['reply_to'] = $comment->reply_to ? $comment->reply_to->toArray() : null; // Handle null reply_to
            return $commentArray;
        });
        // $this->id = $this->comments['id'];
    }

    public function createComment($parent,$reply)
    {
        $timezone = new DateTimeZone('Africa/Cairo');
        $currentTimestamp = (new DateTime('now', $timezone))->format('Y-m-d H:i:s');
         

    // dd($parent); 
        $this->validate([
            'content' => 'required',
        ]);
        
    //   dd($this->all());
         $comment=Comment::create([
            'post_id' => $this->postId,
            'author_id' => session('log'), // Assuming user authentication
            'content' => $this->content,
            'parent_id' => $parent, // Use parent_id if provided
            'reply_id' => $reply,
            'created_at'=>$currentTimestamp,
            'updated_at'=> null // Use reply_id for replies
        ]);

        
        
        
    $this->fetchComments();
    
    session()->flash('message','The comment has been added successfully');
    $this->dispatchBrowserEvent('close-modal');
$this->content ='';


    }

    

    public function updateComment($id)
    {
        $timezone = new DateTimeZone('Africa/Cairo');
        $currentTimestamp = (new DateTime('now', $timezone))->format('Y-m-d H:i:s');
        // dd($id);

    //  dd($currentTimestamp); 
        $this->validate([
            'content' => 'required',
        ]);
        
       
         Comment::where('id',$id)->update([
            
            'content' => $this->content,
            
            'updated_at'=>$currentTimestamp,
            
        ]);

        
        
        
    $this->fetchComments();
    
    session()->flash('message','The comment has been updated successfully');
    $this->dispatchBrowserEvent('close-modal');



    }

    public function deleteComment($id){
        Comment::where('id',$id)->delete();

        
        
        
        $this->fetchComments();
    
    session()->flash('message','The comment has been deleted successfully');
    $this->dispatchBrowserEvent('close-modal');
    
    }

    public function render()
    {
       
        return view('livewire.comments', [
            'comments' => $this->comments,
        ]);
    }
}
