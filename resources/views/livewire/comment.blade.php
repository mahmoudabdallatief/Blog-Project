<div class="col-12 w-100  child">

@if($comment['updated_at']===NULL)
@php
$mysqlTimestamp = strtotime($comment['created_at']);
            $dateWithDayName = date("l, F j, Y \\A\\t h:i:s A", $mysqlTimestamp);
            @endphp
@else
@php
$mysqlTimestamp = strtotime($comment['updated_at']);
            $dateWithDayName = date("l, F j, Y \\A\\t h:i:s A", $mysqlTimestamp);
            @endphp
@endif

         
            

    <div class="comment card {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }} w-100 mb-5">
        <h2><b>{{$comment['user']['name']}}</b><span class="text-warning ms-2">({{$dateWithDayName}})</span></h2>
        <span class="text-primary mb-2">Reply to <b class="text-secondary fs-bold">{{$comment['reply_to']['name']}}</b></span>
        <p>{{ $comment['content'] }}</p> 
       
        <div class="d-flex mb-2">
            <div class="block">
            <button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModal{{$comment['id']}}">reply</button>
           
            <div wire:ignore.self class="modal fade" id="exampleModal{{$comment['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Add Reply</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
      </div>
      <div class="modal-body">
      <form wire:submit.prevent="createComment"  method="post" class="addcomment">
  
  <input type="hidden" name="post_id" value="{{$postId}}" wire:model="postId">
  <input type="hidden" name="parent_id" value="{{ $comment['id'] }}" wire:model="parentId">
  <input type="hidden" name="reply_id" value="{{ $comment['user']['id'] }}" wire:model="replyId">
 

  <textarea name="content" id="content" class="form-control {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" style="height:300px" placeholder="Enter Content of Reply" wire:model="content"></textarea>

  @error('content')
  <span class="error text-danger">{{ $message }}</span>
  @enderror

  <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>
      </div>
    </div>
  </div>
</div>
            </div>
        
        <div class="block">
            <button type="button" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#exampleModalz{{$comment['id']}}">Edit</button>
           
            <div wire:ignore.self class="modal fade" id="exampleModalz{{$comment['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Edit Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
      </div>
      <div class="modal-body ">
      
      
    
      <form   wire:submit.prevent="updateComment({{$comment['id']}})"  class="">
  
 
      <p class="paragraph-comment d-none">{{$comment['content']}}</p>
    <textarea  id="content" wire:model="content"   name="content" class="paragraph-content form-control {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" style="height:300px" placeholder="Enter Content of Comment">{{!! $comment['content'] !!}}</textarea>
   
    
    @error('content')
  <span class="error text-danger">{{ $message }}</span>
  @enderror

      </div>
      <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ">Save changes</button>
       
        </form>
        
      </div>
    </div>
  </div>
</div>
<div class="d-block">
<button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#exampleModali{{$comment['id']}}">Delete</button>
<div wire:ignore.self class="modal fade" id="exampleModali{{$comment['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Delete Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
      </div>
      <div class="modal-body">
        <p class="">{{$comment['content']}}</p>
    
  
    
    
   
    
    

      </div>
      <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        <button wire:click="deleteComment({{$comment['id']}})" class="btn btn-danger">Delete </button>
       
        
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
</div>
    </div>
        @if (!empty($comment['replies']))
            <div class="replies ">
              
                    
                
                @foreach ($comment['replies'] as $reply)
              
                    @include('livewire.comment', ['comment' => $reply])
                @endforeach
                   
                   
               
                
            </div>
        @endif
</div>