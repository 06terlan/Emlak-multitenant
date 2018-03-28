@extends('admin.masterpage_huseynzade')

@section('content')
    @include('admin.error')

    <!-- @if( \App\Library\MyHelper::has_priv('tenant', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
        <a href="{{ route('tenant_add_edit',['tenant' => 0]) }}" class="btn btn-round btn-success btn_add_standart"><i class="fa fa-plus"></i> Şirkət Əlavə et</a>
    @endif -->

       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <a href="{{ route('tenant_add_edit',['tenant' => 0]) }}"> <i class="material-icons" style="color: #fff">add_to_queue</i> </a>
                </div>
                <h4 class="card-title">Simple Table</h4>

              </div>

              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center">#</th>
                                  <th>Şirkətin adı</th>
                                  <th>Tipi</th>
                                  <th class="text-left">Yaranma vaxtı</th>
                                  <th class="text-left">Bitmə vaxtı</th>
                                  <th class="text-right">Tədbirlər</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($tenans as $tenan)   
                              <tr role="row" class="odd">
                                      <td tabindex="0" class="sorting_1">{{ $tenans->perPage() * ($tenans->currentPage() - 1) + $loop->iteration }}</td>
                                      <td>{{ $tenan->company_name }}</td>
                                      <td>{{ $tenan->msk_type->name }}</td>
                                      <td>{{ \App\Library\Date::d($tenan->created_at, "d-m-Y H:i") }}</td>
                                      <td>{{ $tenan->last_date == null ? '-' : \App\Library\Date::d($tenan->last_date) }}</td>
                                      <td class="text-right">
                                        @if( \App\Library\MyHelper::has_priv('tenant', \App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD) )
                                          <a href="{{ route('tenant_add_edit', ['tenant' => $tenan->id]) }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                                          <a href="{{ route('tenant_delete', ['tenant' => $tenan->id]) }}" class="btn btn-link btn-danger btn-just-icon edit"><i class="material-icons">close</i></a>
                                          <a href="{{ route('tenant_payment', ['tenant' => $tenan->id]) }}" class="btn btn-link btn-warning btn-just-icon remove"><i class="material-icons">dvr</i></a>
                                        @endif
                                      </td>
                                  </tr>
                                  @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>


        <div class="row" style="margin-top: 15px">
            <div class="col-sm-12 col-md-5">
                <!-- <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
                  <span style="font-weight: 700">40 </span>Şirkətdən <span style="font-weight: 700">1</span> ilə <span style="font-weight: 700">10</span> arasında göstərilir </div> -->
            </div>
        <div class="col-sm-12 col-md-7 ml-right mr-right">
            {{ $tenans->appends($request->except('page'))->links('admin.pagination', ['paginator' => $tenans]) }}
        </div>
    </div>
      </div>
    </div>
  </div>



           


@endsection

<script>
    var lastId = 17669;
    var notficationCount = 200;
    var _token = "Rkd9ZEEpJk0TgZxUqRDTnlFAnoOQtpgXaJfeTpW9";
    var link = "http://emlakbazasi.com/public/index.php/admin/announcement/getLast";
</script>

<script type="text/javascript">
     

    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });


</script>

@section('css')
    {{--  bootstrap-wysiwyg --}}
<!--     {!! Html::style('admin/assets/vendors/jquery-confirm-master/css/jquery-confirm.css') !!} -->
@endsection

@section('scripts')
    <!-- confirim  -->
<!--     {!! Html::script('admin/assets/build/huseynzade/js/jquery-confirm.js') !!}

    {!! Html::script('admin/assets/vendors/jquery-confirm-master/js/jquery-confirm.js') !!} -->
@endsection