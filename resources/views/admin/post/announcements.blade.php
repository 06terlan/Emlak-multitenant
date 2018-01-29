@extends('admin.masterpage')

@section('content')
    @include('admin.error')

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
                                    <th>Link</th>
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
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $announcement )
                                    <tr>
                                        <td>{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }} {!! $announcement['is_makler']==1?"<i style='color:red;font-size:20px' class='fa fa-child' data-toggle='tooltip' data-original-title='Makler'></i>":'' !!}</td>
                                        <td>{{ $announcement->header }}</td>
                                        <td>{{ $announcement->getShortContent() }}</td>
                                        <td>{{ $announcement->getAnnouncementType() }}</td>
                                        <td>{{ $announcement->amount }}</td>
                                        <td>{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</td>
                                        <td><a target="_blank" href="{{ $announcement->link }}"> Link </a> </td>
                                        <th>
                                            <a href="{{ route('announcement_info',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="İnfo" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>

                                            @if( \App\Library\MyHelper::has_priv("announcement", \App\Library\MyClass::PRIV_CAN_ADD) )
                                                <a href="{{ route('announcement_delete',['id'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                                <a href="{{ route('announcement_pro_add_from',['id'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Fərdiyə əlavə et" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
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
    {{--  bootstrap-wysiwyg --}}
    {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!}
    {{--  iCheck --}}
    {!! Html::style('admin/assets/vendors/iCheck/skins/flat/green.css') !!}
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
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