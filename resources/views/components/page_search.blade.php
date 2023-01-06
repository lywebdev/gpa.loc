<form class="page-search" method="get">
    <label for="search" class="page-search__icon">
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M32.9997 32.9999L25.523 25.5099L32.9997 32.9999ZM29.6663 15.4999C29.6663 19.2572 28.1738 22.8605 25.517 25.5173C22.8603 28.174 19.2569 29.6666 15.4997 29.6666C11.7424 29.6666 8.13909 28.174 5.48233 25.5173C2.82556 22.8605 1.33301 19.2572 1.33301 15.4999C1.33301 11.7427 2.82556 8.13934 5.48233 5.48257C8.13909 2.82581 11.7424 1.33325 15.4997 1.33325C19.2569 1.33325 22.8603 2.82581 25.517 5.48257C28.1738 8.13934 29.6663 11.7427 29.6663 15.4999V15.4999Z" stroke="#B4B4B4" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </label>
    <input
        class="page-search__input"
        type="text"
        id="search"
        placeholder="Введите поисковый запрос"
        name="search"
        @if (\Illuminate\Support\Facades\Request::exists('search'))
            value="{{ \Illuminate\Support\Facades\Request::input('search') }}"
        @endif
    >
</form>
