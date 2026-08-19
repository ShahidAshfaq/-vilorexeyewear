@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <ul class="pagination custom-pagination">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">‹</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a>
                </li>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif

            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">›</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">›</span>
                </li>
            @endif

        </ul>
    </nav>
    <style>
        :root {
    --gold: #C8A56A;
    --gold-dark: #A67C3D;
    --black: #111111;
    --cream: #F8F3EC;
    --light-cream: #FCFAF7;
    --white: #ffffff;
    --border: #E8E0D4;
    --muted: #777777;
}

.custom-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-top: 30px;
}

.custom-pagination .page-item {
    margin: 0;
}

.custom-pagination .page-link {
    min-width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 0 12px;

    color: var(--black);
    background: var(--white);

    border: 1px solid var(--border);
    border-radius: 8px;

    font-size: 14px;
    font-weight: 500;

    text-decoration: none;

    transition: all 0.25s ease;
}

/* Hover */
.custom-pagination .page-link:hover {
    color: var(--white);
    background: var(--gold);
    border-color: var(--gold);
}

/* Active page */
.custom-pagination .page-item.active .page-link {
    color: var(--white);
    background: var(--gold-dark);
    border-color: var(--gold-dark);
}

/* Disabled */
.custom-pagination .page-item.disabled .page-link {
    color: var(--muted);
    background: var(--light-cream);
    border-color: var(--border);
    cursor: not-allowed;
    opacity: 0.6;
}

/* Focus */
.custom-pagination .page-link:focus {
    box-shadow: 0 0 0 3px rgba(200, 165, 106, 0.2);
}

/* Mobile */
@media (max-width: 576px) {
    .custom-pagination {
        gap: 5px;
    }

    .custom-pagination .page-link {
        min-width: 36px;
        height: 36px;
        padding: 0 8px;
        font-size: 13px;
    }
}
    </style>
@endif
