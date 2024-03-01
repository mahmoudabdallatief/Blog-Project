
<div class="col-12 w-100">

@php
            $mysqlTimestamp = strtotime($comment['created_at']);
            $dateWithDayName = date("l, F j, Y \\A\\t h:i:s A", $mysqlTimestamp);
            @endphp
    <div class="comment card w-100 mb-5">
    <p>{{ $comment['content'] }}<span class="text-warning ms-2">{{$dateWithDayName}}</span></p>
        <div class="d-flex">
            <div class="block">
            <button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModal{{$comment['id']}}">reply</button>
           
            <div class="modal fade" id="exampleModal{{$comment['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ route('comment.store') }}">
    @csrf
    <input type="hidden" name="post_id" value= 1>
    <input type="hidden" name="parent_id" value="{{ $comment['id'] }}">
    <div class="form-control border-0">
    <textarea name="content" class="form-control" style="height:300px">{{$comment['content']}}</textarea>
    </div>
    
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
</div>
    </div>
        @if (!empty($comment['replies']))
            <div class="replies">
              
                    
                
                @foreach ($comment['replies'] as $reply)
              
                    @include('partials.comment', ['comment' => $reply])
                @endforeach
                   
                   
               
                
            </div>
        @endif
    

