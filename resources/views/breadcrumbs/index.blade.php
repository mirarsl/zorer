@unless ($breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb">
        <div class="meta">
            @foreach ($breadcrumbs as $breadcrumb)
            
            @if ($breadcrumb->url && !$loop->last)
            <div class="prev"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></div>
            @else
            <div class="next"><span aria-current="page">{{ $breadcrumb->title }}</span></div>
            @endif
            
            @endforeach
        </div>
    </nav>
@endunless
