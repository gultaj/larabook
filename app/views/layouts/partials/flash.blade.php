
@if (Session::get('notify'))

    <div class="alert alert-dismissible alert-{{ Session::get('notify.type') }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('notify.message') }}
    </div>

@endif