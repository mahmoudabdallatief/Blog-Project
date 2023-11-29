@if ($paginator->hasPages())
    <div class="col-12 d-flex justify-content-center my-5 pagination">
        <div class="d-inline-block">
            @php
            $count_rows = $paginator->total();
            $result_per_page = $count_rows / $paginator->perPage();
            $ceil_page = ceil($result_per_page);
            @endphp

            @if ($paginator->currentPage() > 1)
                <a href="{{ $paginator->previousPageUrl() }}" class="text-light text-decoration-none p-2 bg-primary shadow mt-1">Pervious</a>
            @endif

            @for ($n = 1; $n <= $ceil_page; $n++)
                <a href="{{ $paginator->url($n) }}" class="text-light text-decoration-none p-2 bg-primary shadow mt-1 {{ $n == $paginator->currentPage() ? 'text-decoration-none p-2 text-blue  bg-light' : '' }}">{{ $n }}</a>
            @endfor

            @if ($paginator->currentPage() < $ceil_page)
                <a href="{{ $paginator->nextPageUrl() }}" class="text-light text-decoration-none p-2 bg-primary shadow mt-1">Next</a>
            @endif
        </div>
    </div>
@endif