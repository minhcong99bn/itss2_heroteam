@if ($message = Session::get('success'))
    <div class="alert alert-dismissible show" role="alert" style="background-color: #1e87f0; color:white; font-size: 25px;">
        <span class="alert-text"><strong>{{__('Success')}}!</strong>{{ $message }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
