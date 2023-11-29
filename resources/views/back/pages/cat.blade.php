@extends('back.layouts.pages-layout')
@section('title' , 'Categories & Subcategories')
@section('content')
<div class="text-start my-3">
<div class=" success">
                  
                  @if(session('success'))
                                  <div class="alert ss alert-success">{{session('success')}}</div>
                                  @endif
                                  @if(session('failed'))
                                  <div class="alert ss alert-danger">{{session('failed')}}</div>
                                  @endif
                                  </div>
  <h1 class="h2 ">
  Categories & Subcategories
  </h1>  
</div>
<div class="row parent">
<div class="col-md-6 mb-5  child">
    <div class="card h-100 {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
        <div class="d-flex   justify-content-between">
        <h3 class="h3 d-block my-3 mx-5">Categories</h3>
        <button class="btn btn-primary d-block my-3 mx-5" data-bs-toggle="modal" data-bs-target="#modal-simple">Add Category</button>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Add Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
          </div>
          <div class="modal-body ">
            <!-- !-- -->
            <form action="" method ="POST"  id="myFormcat">

              
                        <div class="row">
                                <div class="mb-3">
                                    <label for=""class ="form-label">Category Name</label>
                                    <input type="text" class="form-control  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" placeholder="Enter Category name" name="category_name" id="category_name">

                
                                </div>
                                
                                
                                
            <!-- ! -->
          </div>
          <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-primary" >Save changes</button>
           
</form>

          </div>
        </div>
      </div>
    </div>
        </div>
        </div>
        <table >
            <thead>
            <tr>
                <th>CATEGORY NAME</th>
                <th>N. OF SUBCATEGGORIES</th>
                <th>CONTROLS</th>
            </tr>
            </thead>
           <tbody class="">
            @foreach($categories as $cat)
            <tr>
                <td>{{$cat->category_name}}</td>
                <td>{{$cat->subcategory->count()}}</td>
                <td>
                  <button class="btn btn-success mx-2"data-bs-toggle="modal" data-bs-target="#modal-simplec{{$cat->id}}">Edit</button>
                  <div class="modal modal-blur fade" id="modal-simplec{{$cat->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Edit Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
          </div>
          <div class="modal-body ">
            <!-- !-- -->
            <form action="" method ="POST"  class="myFormcat">

              
                        <div class="row">
                                <div class="mb-3">
                                    <label for=""class ="form-label">Category Name</label>
                                    <input type="text" value="{{$cat->category_name}}" class="form-control  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" placeholder="Enter Category name" name="name_of_category" id="name_of_category">
                                    <input type="hidden" name ="id" value="{{$cat->id}}">
                
                                </div>
           
            <!-- ! -->
          </div>
          <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-primary" >Save changes</button>
           
</form>

          </div>
        </div>
      </div>
    </div>
        </div>
                <button class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#modal-simplecd{{$cat->id}}">Delete</button>
                <div class="modal modal-blur fade" id="modal-simplecd{{$cat->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Are You sure You want to delete The Category ? </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
          </div>
          <div class="modal-body ">
            <!-- !-- -->
           <p>{{$cat->category_name}}</p>
            <!-- ! -->
          </div>
          <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <form action="{{route('deletecat')}}" method="POST">
              @csrf
              <input type="hidden" name= "id" value ="{{$cat->id}}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-danger" >Delete</button>
            </form>

          </div>
        </div>
      </div>
    </div>
        </div>
              </td>
            </tr>
            @endforeach
           </tbody>
</table>
    </div>
</div>

<div class="col-md-6 mb-5 child">
    <div class="card h-100 {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
        <div class="d-flex   justify-content-between">
        <h3 class="h3 d-block my-3 mx-5">SubCategories</h3>
        <button class="btn btn-primary d-block my-3 mx-5"data-bs-toggle="modal" data-bs-target="#modal-simples">Add SubCategory</button>
        <div class="modal modal-blur fade" id="modal-simples" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Add SubCategory</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
          </div>
          <div class="modal-body ">
            <!-- !-- -->
            <form action="" method ="POST"  id="myFormsub">

              
                        <div class="row">
                                <div class="mb-3">
                                    <label for=""class ="form-label">SubCategory Name</label>
                                    <input type="text" class="form-control  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" placeholder="Enter SubCategory name" name="subcategory_name" id="subcategory_name">

                
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Parent Category </label>
                                   
                                    <select name="parent_Category" id="parent_Category" class="form-select  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
                                    <option value="">---No Selected----</option>
                                      @foreach($categories as $cat)
                                      <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                      @endforeach
                                    </select>
                
                                </div>
                                
                                
            <!-- ! -->
          </div>
          <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <button type="button" class="btn  me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-primary" >Save changes</button>
           
</form>

          </div>
        </div>
      </div>
    </div>
    </div>
        </div>
        <table>
            <thead>
            <tr>
                <th>SUBCATEGORY NAME</th>
                <th>PARENT CATEGORY</th>
                <th>N. OF POSTS</th>
                <th>CONTROLS</th>
            </tr>
            </thead>
           <tbody class="">
            @foreach($subs as $sub)
            <tr>
                <td>{{$sub->subcategory_name}}</td>
                <td>
                
            {{$sub->category->category_name}}
                    
                </td>
                <td>
                  {{$sub->post->count()}}
                </td>
                <td><button class="btn btn-success mx-2"data-bs-toggle="modal" data-bs-target="#modal-simpleos{{$sub->id}}">Edit</button>
                  <div class="modal modal-blur fade" id="modal-simpleos{{$sub->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Edit SubCategory</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
          </div>
          <div class="modal-body ">
            <!-- !-- -->
            <form action="" method ="POST"  class="myFormsub">

              
                        <div class="row">
                                <div class="mb-3">
                                    <label for=""class ="form-label">SubCategory Name</label>
                                    <input type="text" value="{{$sub->subcategory_name}}" class="form-control  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" placeholder="Enter Category name" name="name_of_subcategory" id="name_of_subcategory">
                                    <input type="hidden" name ="id" value="{{$sub->id}}">
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Parent Category </label>
                                   
                                    <select name="parent_of_Category" id="parent_of_Category" class="form-select  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
                                      @foreach($categories as $cat)
                                      <option value="{{$cat->id}}"{{$sub->parent_Category == $cat->id ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                      @endforeach
                                    </select>
                
                                </div>
           
            <!-- ! -->
          </div>
          <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-primary" >Save changes</button>
           
</form>

          </div>
        </div>
      </div>
    </div>
        </div>
        <button class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#modal-simplecdeb{{$sub->id}}">Delete</button>
                <div class="modal modal-blur fade" id="modal-simplecdeb{{$sub->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Are You sure You want to delete The SubCategory ? </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif
            </button>
          </div>
          <div class="modal-body ">
            <!-- !-- -->
           <p>{{$sub->subcategory_name}}</p>
            <!-- ! -->
          </div>
          <div class="modal-footer {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <form action="{{route('deletesub')}}" method="POST">
              @csrf
              <input type="hidden" name= "id" value ="{{$sub->id}}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-danger" >Delete</button>
            </form>

          </div>
        </div>
      </div>
    </div>
        </div>
              </td>
            </tr>
            @endforeach
           </tbody>
</table>
</div>
</div>
</div>
@endsection