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

                        <input type="hidden" name="page" value="">

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

                                    <th></th>

                                    <th><input class="form-control formFind" name="header" value="" placeholder="Başlıq"></th>

                                    <th><input class="form-control formFind" name="content" value="" placeholder="Content"></th>

                                    <th>
                                        <select class="form-control formFind" name="type">
                                            <option></option>

                                        </select>
                                    </th>

                                    <th><input class="form-control formFind" name="amount" value="" placeholder="Qiymət"></th>

                                    <th><input class="form-control formFind" name="date" value="" placeholder="Tarix"></th>

                                    <th><input class="form-control formFind" name="user" value="" placeholder="Əlavə edən"></th>

                                    <th>
                                        <select class="form-control formFind" name="status">
                                            <option></option>

                                        </select>
                                    </th>

                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>



                            </tbody>

                        </table>

                    </form>

                    <div class="row">

                        <div class="col-md-12 text-center">



                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection