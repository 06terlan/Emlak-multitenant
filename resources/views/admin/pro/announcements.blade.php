@extends('admin.masterpage')



@section('content')

    @include('admin.error')



    <a href="{{ route('announcement_insert',['announcement' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Add</a>



    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_title">

                    <h2>Elanlar</h2>

                    <ul class="nav navbar-right panel_toolbox">

                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>

                    <div class="clearfix"></div>

                </div>

                <div class="x_content">

                    <form method="get" action="" class="formFinder">

                        <input type="hidden" name="page" value="{{ $request->get("page",1) }}">

                        <table class="table table-striped">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Başlıq</th>

                                    <th>Content</th>

                                    <th>Tipi</th>

                                    <th>Qiymət</th>

                                    <th>Tarix</th>

                                    <th>Əlavə edən</th>

                                    <th>Status</th>

                                    <th>Əməliyyatlar</th>

                                </tr>

                            </thead>

                            <thead>

                                <tr>

                                    <th data-toggle="tooltip" data-original-title="Maklersiz elanlar">
                                        <input type="checkbox" name="no_makler" {{ $request->get("no_makler") ? 'checked' : '' }} class="flat formFind" />
                                    </th>

                                    <th><input class="form-control formFind" name="header" value="{{ $request->get("header") }}" placeholder="Başlıq"></th>

                                    <th><input class="form-control formFind" name="content" value="{{ $request->get("content") }}" placeholder="Content"></th>

                                    <th>
                                        <select class="form-control formFind" name="type">
                                            <option></option>
                                            @foreach (\App\Library\MyClass::$announcementTypes as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $typeK == $request->get("type") ? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </th>

                                    <th><input class="form-control formFind" name="amount" value="{{ $request->get("amount") }}" placeholder="Qiymət"></th>

                                    <th><input class="form-control formFind" name="date" value="{{ $request->get("date") }}" placeholder="Tarix"></th>

                                    <th><input class="form-control formFind" name="user" value="{{ $request->get("user") }}" placeholder="Əlavə edən"></th>

                                    <th>
                                        <select class="form-control formFind" name="status">
                                            <option></option>
                                            @foreach (\App\Library\MyClass::$buttonStatus2 as $typeK => $type)
                                                <option value="{{ $typeK }}" {{ $typeK == \Illuminate\Support\Facades\Input::get('status')? 'selected':'' }}> {{ $type }} </option>
                                            @endforeach
                                        </select>
                                    </th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($announcements as $announcement )

                                    <!-- <tr style="{{ $announcement->buldingType==2?'background-color:#9fd4ef':'background-color:red' }}"> -->

                                        <tr>

                                        <td>{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }} {!! $announcement['is_makler'] == 1?"<i style='color:red;font-size:20px' class='fa fa-child' data-toggle='tooltip' data-original-title='Makler'></i>":'' !!}</td>

                                        <td>{{ $announcement->header }}</td>

                                        <td>{{ $announcement->getShortContent() }}</td>

                                        <td>{{ $announcement->getAnnouncementType() }}</td>

                                        <td>{{ $announcement->amount }}</td>

                                        <td>{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</td>

                                        <td>{{ $announcement->author->fullname() }}</td>

                                        <td>{!! $announcement->getStatus() !!}</td>

                                        <th>
                                            <a style="width: 24px;" href="{{ route('announcement_pro_info',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="İnfo" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>

                                            @if(Auth::user()->role == App\Library\MyClass::ADMIN_ROLE)
                                                <a style="width: 24px;" href="{{ route('announcement_insert',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                                                <a style="width: 24px;" href="{{ route('announcement_pro_delete',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>

                                                <a style="width: 24px;" href="{{ route('announcement_pro_status',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="{{ isset(\App\Library\MyClass::$buttonStatus[$announcement->status]) ? \App\Library\MyClass::$buttonStatus[$announcement->status] : '-' }}" class="btn btn-success btn-xs"><i class="fa fa-thumb-tack"></i></a>
                                            @endif
                                        </th>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </form>

                    <div class="row">

                        <div class="col-md-12 text-center">

                            {{ $announcements->links('admin.pagination', ['paginator' => $announcements]) }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection



@section('css')

    {{--  jquery-confirm --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}

    {{--  iCheck --}}
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}

@endsection



@section('scripts')
    {{--  jquery-confirm --}}
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}\

    {{--  iCheck --}}
    {!! Html::script('admin/assets/vendors/iCheck/icheck.min.js') !!}

    <script>
        $(function () {
            $("input.flat.formFind").on('ifChanged', function (e) {
                $(this).parents("form:eq(0)").submit();
            });
        });
    </script>
@endsection