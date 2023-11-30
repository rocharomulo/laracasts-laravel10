<div class='alert alert-danger'>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div>
