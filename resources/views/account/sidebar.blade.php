<div class="col-sm-3">
    <div class="dash-details-menu-left">
      <div class="tab-group-title">Profile</div>
       <ul class="left-dash-menu">
         <li class="list-group-item {{ (request()->is('account')) ? 'active' : '' }}"><a href="{{route('account')}}">Personal details</a></li>
         <li class="list-group-item {{ (request()->is('account/preferences')) ? 'active' : '' }}"><a href="{{url('account/preferences')}}">Preferences</a></li>
         <!--<li><a href="#">Preferences</a></li>-->
         <!--<li class="list-group-item {{ (request()->is('language')) ? 'active' : '' }}"><a href="{{ url('language') }}">Language</a></li>-->
         <li class="list-group-item {{ (request()->is('update-vehicle')) ? 'active' : '' }}"><a href="{{ url('update-vehicle') }}">Vehicles</a></li>
        <li class="list-group-item {{ (request()->is('notifications')) ? 'active' : '' }}"><a href="{{ url('notifications') }}">Notifications</a></li>
         <!--<li class="active"><a href="#">Contact details</a></li>-->
       </ul>

       <div class="tab-group-title">Money</div>
       <ul class="left-dash-menu"> 
                <li class="list-group-item {{ (request()->is('account/payments')) ? 'active' : '' }}"><a href="{{ url('account/payments') }}">Payment settings</a></li>

         <!--<li><a href="#">Payment settings</a></li>-->
                  <li class="list-group-item {{ (request()->is('account/payout')) ? 'active' : '' }}"><a href="{{ url('account/payout') }}">Payout settings</a></li>
       </ul>

       <div class="tab-group-title">Security</div>
       <ul class="left-dash-menu"> 
                <li class="list-group-item {{ (request()->is('account/email')) ? 'active' : '' }}"><a href="{{url('account/email')}}">Email addresses</a></li>

         <!--<li><a href="#">Email addresses</a></li>-->
         <li class="list-group-item {{ (request()->is('password/change')) ? 'active' : '' }}"><a href="{{url('password/change')}}">Password</a></li>
         <!--<li><a href="#">ID verification</a></li>-->
         <li class="list-group-item {{ (request()->is('account/social/connection')) ? 'active' : '' }}"><a href="{{route('social')}}">Social accounts</a></li>
         <li class="list-group-item {{ (request()->is('account/close')) ? 'active' : '' }}"><a href="{{route('account_close')}}">Close account</a></li> 
       </ul>

    </div>
  </div>
  
  