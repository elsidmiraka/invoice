<div>
    @if (session('status'))
        <div class="container alert alert-success rounded-sm mt-3">
            {{ session('status') }}
        </div>
    @endif
</div>