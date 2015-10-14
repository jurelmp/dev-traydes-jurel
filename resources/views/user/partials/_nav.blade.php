<div class="list-group">
    <a href="#" class="list-group-item">Dashboard</a>
    <a href="{{ url('user/account-settings') }}" class="list-group-item @if(Request::is('user/account-settings')) active @endif">Account Settings</a>
    <a href="{{ url('user/profile') }}" class="list-group-item @if(Request::is('user/profile')) active @endif">Profile</a>
</div>