@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <div class="main py-4">
    <div class="row">
      <div class="col-12 col-xl-12">
        <div class="col-12 px-0">
          <div class="card border-0 shadow">
            <div class="card-body">
              <h2 class="fs-5 fw-bold mb-1">{{ __('Table IP Address') }}</h2>
              <p>{{ __('Ini Adalah Data IP Address') }}</p>

              <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                  <thead class="thead-light">
                    <tr>
                      <th class="border-0 rounded-start">IP Address</th>
                      <th class="border-0">In-Interface</th>
                      <th class="border-0 rounded-end">Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($response as $item) 
                    <!-- Item -->
                    <tr>
                      <td class="border-0 font-weight-bold">{{ $item['address'] ?? '' }}</td>
                      <td class="border-0 font-weight-bold">{{ $item['interface'] ?? '' }}</td>
                      <td class="border-0 font-weight-bold">{{ $item['comment'] ?? '' }}</td>
                    </tr>
                    <!-- End of Item -->
                    @endforeach
                  </tbody>
                </table>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection