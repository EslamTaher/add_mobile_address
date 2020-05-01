@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
            @forelse($clients as $client)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $client->phone }}</h5>
                        <p class="card-text">{{ $client->address }}</p>
                        <a href="{{ route('clients.edit' , $client) }}" class="btn btn-primary mb-4">Update</a>
                        {!! Form::model($client,['route' => ['clients.destroy' , $client],'method' => 'delete' ]) !!}
                            {!! Form::submit('delete!', ['class' =>'btn btn-danger ']); !!}
                        {!! Form::close() !!}
                </div>
            </div>
        @empty
            <div class="alert alert-info">no info till now!!</div>
        @endforelse
        </div>
    </div>
</div>
@endsection
