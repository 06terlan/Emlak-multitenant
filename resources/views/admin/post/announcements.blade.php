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
                        <tbody>
                            @foreach ($announcements as $announcement )
                                <tr>
                                    <td>{{ $announcements->perPage() * ($announcements->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $announcement->header }}</td>
                                    <td>{{ $announcement->getShortContent() }}</td>
                                    <td>{{ $announcement->getAnnouncementType() }}</td>
                                    <td>{{ $announcement->amount }}</td>
                                    <td>{{ App\Library\Date::d($announcement->date,'d-m-Y') }}</td>
                                    <td><a target="_blank" href="{{ $announcement->link }}"> Link </a> </td>
                                    <th>
                                        <a href="{{ route('announcement_info',['announcement'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="İnfo" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>
                                        <a href="{{ route('announcement_delete',['id'=>$announcement->id]) }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-xs deleteAction"><i class="fa fa-trash"></i></a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endsection

@section('scripts')
    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!}
@endsection