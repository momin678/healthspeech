<style>
 .pointer{ cursor: pointer;}
</style>
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{url('/')}}"><img src="https://healthspeech.com/public/images/health-speech-logo.png" width="30" alt="health speech logo"><span class="m-l-10">Health Speech</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        <li><a href="https://healthspeech.com/all-health-topics" title="Article Categories"><i class="zmdi zmdi-collection-text"></i></a></li>

        <li class="float-right"> 
            @if(Auth::check() && (Auth::user()->user_type == 'admin'))
            <a class="nav-link" href="{{route('admin.deshbord')}}">Deshboard</a>
            @endif
            <a href="https://www.facebook.com/HealthSpeech24" title="facebook"><i class="zmdi zmdi-facebook-box"></i></a>
            <a href="https://twitter.com/SpeechHealth" title="twitter"><i class="zmdi zmdi-twitter-box"></i></a>
        </li>
    </ul>
</nav>

