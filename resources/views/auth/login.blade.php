@extends('layouts.app')
@section('title')
{{trans('message.Login')}}
@endsection
@section('content')
<div class="container">  
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('message.Login')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{trans('message.E-Mail Address')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{trans('message.Password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{trans('message.Remember Me')}} 
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('message.Login')}}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   {{trans('message.Forgot Your Password?')}} 
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
/*$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $('form').on('submit',function(e){
        e.preventDefault();
        //console.log("Submit");
        $.post($(this).attr('action'),
            {
                email:$('#email').val(),
                password:$('#password').val()
            },
            function(response){
            //console.log(response);
            $.ajax({
                url:"/home",
                data: "POST",
                //dataType: "email=" + email,
                success: function(strDate){
                    $(".help-block").text(strDate);
                }
            });
        });
     });
});
/*$(document).ready(function(){
    $.ajax({
        url: "login",
        data: "POST",
        dataType: "email=" + email,
        success: function(strDate){
            $(".help-block").text(strDate);
        }
    });
    console.log($.ajax);
});*/
</script>
@endsection