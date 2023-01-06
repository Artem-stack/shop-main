@extends('layouts.main')

@section('content')

<div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="name"
                   required maxlength="255" value="">
        </div>

    <h1 class="mb-4">checkout</h1>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post" action="{{ route('cart.saveorder') }}">
        @csrf
        <div class="form-group">
            <input type="text" id="name" class="form-control" name="name" placeholder="name"
                   required maxlength="255" value="{{ old('name') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="email" id="email" class="form-control" name="email" placeholder="email"
                   required maxlength="255" value="{{ old('email') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" id="phone" class="form-control" name="phone" placeholder="phone"
                   required maxlength="255" value="{{ old('phone') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" id="address" class="form-control" name="address" placeholder="delivery address"
                   required maxlength="255" value="{{ old('address') ?? '' }}">
        </div>
        <div class="form-group">
            <textarea id="comment" class="form-control" name="comment" placeholder="comment(optional)"
                      maxlength="255" rows="2">{{ old('comment') ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Design</button>
        </div>
    </form>
@endsection

