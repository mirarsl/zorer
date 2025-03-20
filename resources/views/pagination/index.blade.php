@if ($paginator->hasPages())
<ul class="pagination mt-5">
    @if (!$paginator->onFirstPage())
    <li class="page-item"> <a class="page-link" href="{{ $paginator->currentPage() == 2 ? str_replace('?page=1','',$paginator->previousPageUrl()) : $paginator->previousPageUrl() }}">{{__('tariffe.prev')}}</a> </li>
    @endif
    @foreach ($elements as $element)
    @if (is_string($element))
    @endif
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item"><a class="page-link active">{{ $page }}</a></li>
    @else
    <li class="page-item"><a class="page-link" href="{{ $page == 1 ? str_replace('?page=1','',$url) : $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <li class="page-item"> <a class="page-link" href="{{ $paginator->nextPageUrl() }}">{{__('tariffe.next')}}</a> </li>
    @endif
  </ul>
@endif