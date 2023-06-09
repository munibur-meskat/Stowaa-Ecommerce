

{{-- @if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" >Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Previous</a>
            </li>
        @endif


        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" >Next</span>
            </li>
        @endif
    </ul>
</nav>
@endif --}}

{{-- =============== --}}

@if ($paginator->hasPages())
<nav>
  <ul class="pagination_nav">

    {{-- Previous Page Link --}}

    @if ($paginator->onFirstPage())
    <li class="page-item prev_btn disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        <a class="page-link" href="#"><i class="fal fa-angle-left"></i></a>
        
    </li>
  @else
    <li class="page-item prev_btn">
      <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fal fa-angle-left"></i></a>
    </li>
  @endif

  {{-- Pagination Elements --}}

  @foreach ($elements as $element)

  @if (is_string($element))
      <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
  @endif

  @if (is_array($element))
      @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
              <li class="page-item active" aria-current="page">
                <a href="#" class="page-link">{{ $page }}</a>
              </li>
          @else
              <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @endif
      @endforeach
  @endif
@endforeach

 {{-- Next Page Link --}}

 @if ($paginator->hasMorePages())
 <li class="page-item next_btn">
     <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fal fa-angle-right"></i></a>
 </li>
@else
 <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">

     <a href="#" class="page-link" aria-hidden="true"><i class="fal fa-angle-right"></i></a>
 </li>
@endif

</ul>
</nav>

@endif










