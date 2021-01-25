@if(session()->has('error'))
    <div class="btn text-uppercase btn-outline-danger btn-block my-2" type="text">
        {{session()->get('error')}}
    </div>
@endif
