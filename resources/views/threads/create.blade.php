@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="card-header">
            Create A New Thread</div>
        <br>
        <form method="post" action="/threads">
            @csrf
            <div class="form-group">
                <label for=="channel_id'>Choose a channel:</label>
                <select type='select' name='channel_id'  class="form-control" required>
                    <option value="">Select appropriate</option>
                    @foreach($channels as $channel)
                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                            {{ $channel->name }}
                </option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Title</label>
                <input type='text' name='title'  class="form-control"  placeholder="Your Thread Title" value="{{old('title')}}" required>
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea class="form-control"  rows="8" name='body' required> {{old('body')}} </textarea>
            </div>
            <button type='submit' class='btn btn-primary'>Publish</button>
            
            <p>

            @if(count($errors))
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </form>
    </div>
</div>

@endsection
