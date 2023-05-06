@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('البلديات') }}
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
                                <th>{{ __('المدينة') }}</th>
                                <th>{{ __('العمليات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($municipalities as $k => $municipality)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $municipality->name }}</td>
                                <td>{{ $municipality->city->name }}</td>
                                <td>

<a href="{{route('municipalities.edit',['municipality'=>$municipality->id])}}" >تعديل
</a>
<form action="{{ route('municipalities.destroy',['municipality' => $municipality->id]) }}" method="POST" autocomplete="off">
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
                @if( $municipalities->hasPages() )
                <div class="card-footer pb-0">
                    {{ $municipalities->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
