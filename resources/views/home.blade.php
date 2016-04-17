@extends('layouts.app')

@section('content')
<script type="text/javascript">
$(document).ready(function(){
    $('#submit').click(function(){
        $.ajax({
            url: '/home',
            type:'POST',
            data:
            {   
                'user_id': $("#user_id").val(),
                'message': $("#message").val()
            },           
        });
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
                <form role='form' name='status' method='POST' action="{{url('/home')}}">
                    <input type='hidden' name='user_id' id='user_id' value='{{Auth::user()->id}}'/>
                    <textarea class="form-control" rows="5" id="message" name='message'></textarea>
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
