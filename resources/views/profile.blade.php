@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary">
                {{$user['name']}}
            </div>
            <div class ="panel panel-default">
                Followers: {{$followers}}
                <br>
                Following: {{$following}}
            </div>
            @if(!Auth::guest())
                @if(!$isFollowing)
                <form role='form' name='status' method='POST' action="{{url('/follow')}}">
                    {{ csrf_field() }}
                    <input type='hidden' name='user_id' id='user_id' value='{{Auth::user()->id}}'>
                    <input type='hidden' name='follow_id' id='follow_id' value='{{$user['id']}}'>
                    <input type="submit" class="btn btn-primary" value="Follow">                    
                </form>
                @else
                <form role='form' name='status' method='POST' action="{{url('/unfollow')}}">
                    {{ csrf_field() }}
                    <input type='hidden' name='user_id' id='user_id' value='{{Auth::user()->id}}'>
                    <input type='hidden' name='follow_id' id='follow_id' value='{{$user["id"]}}'>

                    <input type="submit" class="btn btn-danger" value="Unfollow">
                </form>
                @endif
            @endif
        </div>
        <div class="col-md-10">
            @foreach($status as $message)
            <div class="panel panel-default">
                {{$message->status}}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection