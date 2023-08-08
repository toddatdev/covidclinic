<div class="container main-header bg-secondary py-3">
 <div class="row">
     <div class="col-12 col-lg-6 px-0">
         <a href="{{route('root')}}">
             <img class="w-50 site_logo" src="{{ asset('media/logo.png') }}" alt="">
         </a>
     </div>

     <div class="col-12 col-lg-6 px-0 my-auto text-right">

         @if(!empty(auth()->user()->name))

             <ul class="list-inline mr-3">

                 @if(auth()->user()->is_admin === 1)
                 <li class="list-inline-item text-white"><a class="text-white" href="{{route('dashboard.index')}}"><i class="far fa-arrow-alt-circle-left"></i> Back to Dashboard</a></li>
                 <li class="list-inline-item text-white">|</li>
                 @endif

                 <li class="list-inline-item text-white"><a class="text-white" href=""><i class="far fa-user"></i> {{ Auth::user()->name }}</a></li>

                 <li class="list-inline-item text-white">|</li>

                 <li class="text-white list-inline-item">
                     <a class="text-white" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                 <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                 </form>
             </ul>

         @endif
     </div>
 </div>

</div>




