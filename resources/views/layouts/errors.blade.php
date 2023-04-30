@if ($errors->any())
    <div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <i class="ri-alert-line me-3 align-middle fs-16"></i><strong>Warning</strong>
        - {{$error}} <br>
        @endforeach

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
