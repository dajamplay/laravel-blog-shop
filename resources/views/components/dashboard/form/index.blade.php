<form action="{{$action}}" method="post">
    @csrf
    @method($method)
    {{ $slot }}
</form>


