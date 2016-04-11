@extends('layouts.app')

@section('content')

<script>
$('#submit').click(function()
{
    $.ajax({
        url: send_email.php,
        type:'POST',
        data:
        {
            email: email_address,
            message: message
        },           
    });
});
</script>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary">
                Hi {{Auth::user()->name}}
            </div>
            <div class ="panel panel-default">
                Followers: {{$followers}}
                <br>
                Following: {{$following}}
            </div>

        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <form role='form' name='status' method='POST' action="{{url('/postStatus')}}">
                    {{ csrf_field() }}
                    <textarea rows="4" cols="50" name="comment" form="status">Enter text here...</textarea>
                    <input type="submit"/>
                </form>
                
            </div>
            @foreach($status as $message)
            <div class="panel panel-default">
                {{$message->status}}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
