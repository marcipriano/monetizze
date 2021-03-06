<div class="mt-3">
@if (isset($errors) && $errors->any())
    <div class="alert alert-danger  alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @foreach ($errors->all() as $error)
            {!! $error !!}<br/>
        @endforeach
    </div>
@endif
@if (Session::get('flash_success'))
    <div class="alert alert-success  alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @if(is_array(json_decode(Session::get('flash_success'), true)))
            {!! implode('', Session::get('flash_success')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_success') !!}
        @endif
    </div>
@endif
@if (Session::get('flash_warning'))
    <div class="alert alert-warning  alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @if(is_array(json_decode(Session::get('flash_warning'), true)))
            {!! implode('', Session::get('flash_warning')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_warning') !!}
        @endif
    </div>
@endif
@if (Session::get('flash_info'))
    <div class="alert alert-info  alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @if(is_array(json_decode(Session::get('flash_info'), true)))
            {!! implode('', Session::get('flash_info')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_info') !!}
        @endif
    </div>
@endif
@if (Session::get('flash_danger'))
    <div class="alert alert-danger  alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @if(is_array(json_decode(Session::get('flash_danger'), true)))
            {!! implode('', Session::get('flash_danger')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_danger') !!}
        @endif
    </div>
@endif
@if (Session::get('flash_message'))
    <div class="alert alert-info  alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @if(is_array(json_decode(Session::get('flash_message'), true)))
            {!! implode('', Session::get('flash_message')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_message') !!}
        @endif
    </div>
@endif
</div>
