@if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong><br/>
                @endforeach
            </div>
        </div>
    </div>
@endif