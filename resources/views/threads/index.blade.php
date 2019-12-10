@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse($threads as $thread)
            <div class="card">
                <div class="card-header"><div class="card-body">
                        <div class="level">
                            <h4 class="flex">
                                <a href="{{ $thread->path() }}" > {{$thread->title}} </a>
                            </h4>
                            <strong>
                                <a href="{{ $thread->path() }}"> {{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count) }} </a>
                            </strong>

                        </div>

                        <div class="body">{{$thread->body}}</div></div>
                    <hr>
                </div>
            </div>
            @empty
            <p> There are no relevant threads in this category.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
