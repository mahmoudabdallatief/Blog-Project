
<div>

    <div class="row" >
<div class="col-md-4">
    <div class="mb-3">
    
        <label for="" class="form-label">Search</label>
        <input type="text"  wire:model="query"  class="w-100 form-control {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}  search" placeholder="Search">
    </div>
</div>

<div class="col-md-4 d-flex justify-content-md-center">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Sort By</label>
        <select wire:model="sort" class="form-control {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <option value="asc">ASC</option>
            <option value="desc">DESC</option>
        </select>
    </div>
</div>

<div class="col-md-4 d-flex justify-content-md-center">
    <div class="mb-3 w-50">
        <label for="" class="form-label">Category</label>
        <select wire:model="sub_id" class="form-control {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
        <option value="">---No Selected----</option>
            @foreach($subs as $sub)
                <option value="{{$sub->id}}">{{$sub->subcategory_name}}</option>
            @endforeach
        </select>
    </div>
</div>

</div>
<div class="row my-5 data"  >
    @if(count($posts)==0)
    <p class="text-danger text-center">No Posts Found</p>
    @else
    @foreach($posts as $post)
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3 res  " >
            <div class="card h-100  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <a href="{{ route('single', ['id' => $post->id]) }}">
                <span class="avatar w-100 avatar-xl mb-3 rounded" style="background-image: url(images/{{$post->featured_image}})"></span>
</a>
<a class="h3 text-decoration-none" href="{{ route('single', ['id' => $post->id]) }}">
                <h3 class="m-3 mt-2 ">{{$post->post_title}}</h3>
                </a>
                <div class="d-flex">
                  <a href="{{route('editpost',['id'=>$post->id])}}" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                    
                      Edit</a>
                      <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modal-simplet{{$post->id}}" >
                    
                      Delete</a>
</div>
                      <div class="modal modal-blur fade" id="modal-simplet{{$post->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Are You sure You want to delete The Post ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif    
            </button>
          </div>
          <div class="modal-body">
            <p>{{$post->post_title}}</p>
           
</div>
          <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            

  <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-del" data-bs-dismiss="modal">Delete</button>

           
           


          </div>
        </div>
      </div>
  

                    </div>
            </div>
        </div>
    @endforeach
    @endif
</div>

<div class="row mt-3 pag" role="navigation">
    {{ $posts->links('vendor.livewire.bootstrap') }}
</div>
</div>
