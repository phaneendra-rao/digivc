@extends('user_layouts.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5>Getting things ready!</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('page-css')

@stop

@section('page-scripts')

<!-- am chart -->
<script src="{{asset('sources/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{asset('sources/assets/pages/widget/amchart/serial.min.js')}}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{asset('sources/bower_components/chart.js/js/Chart.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript" src="{{asset('sources/assets/pages/todo/todo.js')}} "></script>

<script>
    $('#send_emails_btn').click(() => {
        $.ajax({
            url: "{{url('/')}}/{{auth()->user()->account_type}}/send_emails",
            method: "POST",
            data: new FormData($('#send_emails_form')[0]),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: () => {
                $('#overlay').removeClass('d-none');
            },
            success: (data) => {
                console.log(data);
            },
            complete: (data) => {
                $('#overlay').addClass('d-none');
            }
        });

    });
</script>
@stop