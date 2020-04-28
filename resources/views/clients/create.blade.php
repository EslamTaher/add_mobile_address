@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'clients.store' , 'class' => 'col-md-6 col-md-offset-6']) !!}
    <div class="form-group">
        {!!Form::label('phone', 'phone number')!!}
        {!! Form::text('phone', null ,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!!Form::label('address', 'Address')!!}
        {!! Form::text('address', null ,['class' => 'form-control']) !!}    </div>

    {!! Form::submit('Create!', ['class' =>'btn btn-primary btn-block']); !!}
{!! Form::close() !!}
@endsection