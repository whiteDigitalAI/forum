@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-header">
                <a href="/profiles/{{ $thread->creator->name }}"> {{ $thread->creator->name }}</a> posted

                {{ $thread->title }}</div>

            <div class="card-body">
                {{ $thread->body }}
            </div>
            
            

            @foreach ($thread->replies as $reply)
            @include('threads.reply')
            @endforeach
            
            {{ $replies->links() }}



            @if ( auth()->check() )



            <form method="post" action="{{ $thread->path() . '/replies'}}">
                @csrf

                <div class='form-group'>

                    <textarea name='body' id='body' class='form-control' rows='5' placeholder="Have something to Say?"></textarea>

                </div> 

                <button type="submit" class='btn btn-primary'>Post</button>
            </form>

            @else
            <p class="text-center">Please <a href="{{ route('login') }}"> sign in </a> to participate in this discussion.</p>

            @endif

        </div>

        <div class="col-md-4">
            
            <div class="card-body">
                <p>
                    This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="#">{{ $thread->creator->name }}</a> 
                    and currently has {{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count) }}.
                </p>
            </div>


        </div>
    </div>
</div>
@endsection