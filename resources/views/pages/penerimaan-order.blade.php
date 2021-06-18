@extends('layouts.main')
@section('title', 'Tabel Order Penerimaan')
@section('content')


    <div class="container-fluid">

        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Tambah Penerimaan ') }}</h5>
                            {{-- <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit') }}</span> --}}
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ url('/penerimaan') }}">{{ __('Data Penerimaan') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Tambah Penerimaan') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        @livewire('penerimaan-order.index', ['id' => session('id')])


    </div>


    @push('script')

        <script src="{{ asset('plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('js/form-picker.js') }}"></script>

        <script>
            window.addEventListener('openModal', event => {
                $("#exampleModalCenter").modal('show');

            });
            window.addEventListener('closeModal', event => {
                $("#exampleModalCenter").modal('hide');

            });

        </script>
        <script>
            $('#appointmentDate').datetimepicker({
                // format: 'L',
                format: 'YYYY/MM/DD'
            });
            $('#appointmentDatee').datetimepicker({
                // format: 'L',
                format: 'YYYY/MM/DD'
            });

            $('#appointmentDate').on("change.datetimepicker", function(e) {
                let date = $(this).data('appointmentdate');
                eval(date).set('spk_date', $('#appointmentDateInput').val());
            });
            $('#appointmentDatee').on("change.datetimepicker", function(e) {
                let date = $(this).data('appointmentdatee');
                eval(date).set('spm_date', $('#appointmentDateeInput').val());
            });

        </script>

    @endpush
@endsection
