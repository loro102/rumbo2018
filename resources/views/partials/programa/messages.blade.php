@if(session('message'))
    <div class="alert alert-{{session('message')[0]}}">{{session('message')[1]}}</div>
@endif