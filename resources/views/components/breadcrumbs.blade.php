@unless ($breadcrumbs->isEmpty())
    <!-- START breadcrumbs section -->
    <ol class="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <div class="breadcrumbs__item">
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    <span class="breadcrumbs__delimiter">
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.899902 8.75005L4.1499 5.50005L0.899902 2.25005L1.5499 0.950049L6.0999 5.50005L1.5499 10.05L0.899902 8.75005Z" fill="#828282"/>
                        </svg>
                    </span>
                </div>
{{--                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>--}}
            @else
                <div class="breadcrumbs__item breadcrumbs__item_active">{{ $breadcrumb->title }}</div>
            @endif

        @endforeach
    </ol>
    <!-- END breadcrumbs section -->
@endunless
