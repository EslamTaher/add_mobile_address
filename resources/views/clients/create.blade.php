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
{!! Form::open(['route' => 'clients.store' , 'class' => 'col-md-6 col-md-offset-6']) !!}
    <div class="form-group">
        {!!Form::label('phone', 'phone number')!!}
        {!! Form::text('phone', null ,['class' => 'form-control']) !!}
        @if($errors->any())
        <p class="alert alert-danger card-subtitle mb-2 ">{{$errors->first('phone')}}</p>
        @endif($errors->any())
    </div>
    <div class="form-group">
    {!!Form::label('address', 'Address')!!}
        {!! Form::text('address', null ,['class' => 'form-control']) !!}    </div>

    {!! Form::submit('Create!', ['class' =>'btn btn-primary btn-block']); !!}
{!! Form::close() !!}
@endsection