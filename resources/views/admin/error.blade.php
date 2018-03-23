@if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" aria-hidden="true" class="close">×</button>
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong><br/>
                @endforeach
            </div>
        </div>
    </div>
@endif