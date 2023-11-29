<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\SubCategory;
use App\Models\Post;
use Livewire\Component;


class ShowPosts extends Component
{
    use WithPagination;

    public $query;
    public $sub_id;
    public $sort = 'desc';
    protected $paginationTheme = 'bootstrap';
  

    public function render()
{
    $query = '%' . $this->query . '%';
    $subId = $this->sub_id;

    // Filter the posts
    $postsQuery = Post::query()
        ->when($this->query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('post_title', 'like', $query);
            });
        })
        ->when($this->sub_id, function ($queryBuilder) use ($subId) {
            return $queryBuilder->where('category_id', $subId);
        })
        ->where('author_id', session('log'))
        ->orderBy('id', $this->sort);

    $posts = $postsQuery->paginate(2);
    $posts1 =Post::all();
    $subs = SubCategory::whereIn('id', $posts1->pluck('category_id'))->get();

    // Check if the current page is empty
    if ($posts->isEmpty() && $posts->currentPage() > 1) {
        // Calculate the previous page number
        $previousPage = $posts->currentPage() - 1;

        // Set the component's page property to the previous page
        $this->setPage($previousPage);

        // Re-render the component
        $this->render();

        // Return an empty response since the component will be re-rendered
      
    }

    // Render the view
    return view('livewire.show-posts', [
        'posts' => $posts,
        'subs' => $subs,
        
      
    ]);
}

    public function delete($id)
    {
        $post = Post::find($id);

        // Check if the post object is not null and has a `featured_image` property
        if (!is_null($post) && !empty($post->featured_image)) {
            // Delete the image file if it exists
            $imagePath = public_path('images') . '/' . $post->featured_image;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the post
        Post::where('id', $id)->delete();
        
        // Refresh the Livewire component
        $this->render();
    }
}