@if($errors->any())
<div>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert"> {{ $error }} </div>
    @endforeach
</div>
@endif