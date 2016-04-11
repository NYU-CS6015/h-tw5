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
            <div class="panel panel-default">
                Hi {{Auth::user()->name}}
            </div>
            <div class ="panel panel-default">
                Followers: {{}}
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <form>
                </form>
            </div>
            @foreach($status as $message)
            <div class="panel panel-default">
                {{$message->status}}
            </div>
        </div>
    </div>
</div>
@endsection
