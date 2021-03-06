<div class="mb-3">
    <nav aria-label="...">
        <ul class="pagination">
            @if($table->currentPage() != 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $table->previousPageUrl() }}">Previous</a>
                </li>
                @if($table->currentPage() - 3 >= 1)
                    <li class="page-item">
                        <a class="page-link" href="/{{ $page }}">1</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link"
                       href="{{ $table->previousPageUrl() }}">{{ $table->currentPage() - 1 }}</a>
                </li>
            @endif
            <li class="page-item active" aria-current="page">
                <a class="page-link">{{$table->currentPage()}}</a>
            </li>
            @if($table->currentPage() != $table->lastPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $table->nextPageUrl() }}">{{ $table->currentPage() + 1 }}</a>
                </li>
                @if($table->currentPage() + 3 <= $table->lastPage())
                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href="/{{ $page . '?page=' . $table->lastPage() }}">{{ $table->lastPage() }}</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link"
                       href="{{$table->nextPageUrl() }}">Next</a>
                </li>
            @endif
        </ul>
    </nav>
</div>
