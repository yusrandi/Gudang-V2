<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3>{{ __('Data Penerimaan') }}</h3>
            </div> --}}
            <div class="card-body template-demo">

                <div class="form-group row">

                    <div class="col-sm-3">
                        <select wire:model="filterTahun" class="custom-select">
                            {{ $last = date('Y') - 20 }}
                            {{ $now = date('Y') }}
                            <option value="{{ $now }}">pilih Tahun</option>

                            @for ($i = $now; $i >= $last; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>


                    <div class="col-sm-3">
                        <select wire:model="klasifikasi_id" class="custom-select">
                            <option value="">pilih Spesifikasi</option>

                            @foreach ($klasifikasis as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-sm-6 row">
                        <a href="{{ route('pengeluaran.create') }}" type="button" class="btn btn-info"><i
                                class="ik ik-printer"></i>{{ __('Cetak Data') }}</a>
                        <a href="{{ route('penerimaan.create') }}" type="button" class="btn btn-primary"><i
                                class="ik ik-printer"></i>{{ __('Export Data') }}</a>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('TANGGAL') }}</th>
                                <th>{{ __('JENIS BARANG') }}</th>
                                <th>{{ __('MASUK') }}</th>
                                <th>{{ __('KELUAR') }}</th>
                                <th>{{ __('SISA') }}</th>
                            </tr>

                        </thead>
                        <tbody>

                            @foreach ($reports as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->penerimaan->barang->name }}</td>
                                    <td>{{ $item->status == 1 ? $item->qty : '0' }}</td>
                                    <td>{{ $item->status == 1 ? '0' : $item->qty }}</td>
                                    <td>{{ $item->sisa }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
