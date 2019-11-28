@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href='#'> {{ $thread->creator->name }}</a> posted
                    
                    {{ $thread->title }}</div>

                <div class="card-body">
                   {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                 
            @foreach ($thread->replies as $reply)
             @include('threads.reply')
            @endforeach
          
            </div>
            
        </div>
            
</div>


@if ( auth()->check() )
<div class="row justify-content-center">
        <div class="col-md-8">
            
            <form method="post" action="{{ $thread->path() . '/replies'}}">
                @csrf
                
                <div class='form-group'>
                    
                    <textarea name='body' id='body' class='form-control' rows='5' placeholder="Have something to Say?"></textarea>
                    
                </div> 
                
                <button type="submit" class='btn btn-primary'>Post</button>
            </form>
        </div>
            @else
            <p class="text-center">Please <a href="{{ route('login') }}"> sign in </a> to participate in this discussion.</p>
</div>
@endif

@endsection
