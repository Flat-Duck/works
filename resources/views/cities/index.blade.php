@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('المدن') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

            <div class="alert alert-info">
                <div class="alert-title">Sample table page</div>
            </div>

            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('العمليات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $k => $city)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $city->name }}</td>
                                <td>

<a href="{{route('cities.edit',['city'=>$city->id])}}" >تعديل
</a>
<form action="{{ route('cities.destroy',['city' => $city->id]) }}" method="POST" autocomplete="off">
    @csrf
    @method('DELETE')
    <input type="submit" value="delete">
</form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if( $cities->hasPages() )
                <div class="card-footer pb-0">
                    {{ $cities->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
