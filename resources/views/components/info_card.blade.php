<a href="{{ $link ?? '#' }}" class="info-card">
    <div class="info-card__overlay">
        <div class="info-card__overlay__bg {{ $classes }}"></div>
        <div class="info-card__image">
            <img src="{{ $image }}" alt="">
        </div>
    </div>
    <span class="info-card__title">{{ $title }}</span>
    <span class="info-card__description">{{ $description }}</span>
</a>
