@if ($errors->any())
  @foreach ($errors->all() as $error)
      <strong style="color: red;">{{ $error }}</strong><br/>
  @endforeach
@endif