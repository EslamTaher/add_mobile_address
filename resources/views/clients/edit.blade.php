@extends('layouts.app')

@section('content')
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                <li> {{  $message }} </li>
                @endforeach
            </ul>
        </div>
    @endif
{!! Form::model($client,['route' => ['clients.update' , $client],'method' => 'put' , 'class' => 'col-md-6 col-md-offset-6']) !!}
    <div class="form-group">
        {!!Form::label('phone', 'phone number')!!}
        {!! Form::text('phone', null ,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!!Form::label('address', 'Address')!!}
        {!! Form::text('address', null ,['class' => 'form-control']) !!}    </div>

    {!! Form::submit('update!', ['class' =>'btn btn-success btn-block']); !!}
{!! Form::close() !!}
@endsection