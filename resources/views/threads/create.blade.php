@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Create A New Thread</div>

                       <form method="post" action="/threads">
                        @csrf
                        
                        <div class="form-group">
                            <label>Title</label>
                            <input type='text' name='title' id ='title' >
                        </div>
                        
                        <div class="form-group">
                            <label>Body</label>
                            <textarea name='body' rows=8 id ='body'></textarea>
                        </div>
                        
                        <button type='submit' class='btn btn-primary'>Publish</button>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
