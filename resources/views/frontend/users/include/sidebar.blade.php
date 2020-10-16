<div class="wn__sidebar">
    <aside class="widget recent_widget">
        <ul>
            <li class="list-group-item">
                <img src="{{ asset('assets/users/'.auth()->user()->user_image) }}" alt="{{ auth()->user()->name }}">
            </li>

            <li class="list-group-item"><a href="{{ route('frontend.index') }}">My Posts</a></li>
            <li class="list-group-item"><a href="{{ route('users.post.create') }}">Create Post</a></li>
            <li class="list-group-item"><a href="{{ route('users.comments.manage') }}">Manage Comments</a></li>
            <li class="list-group-item"><a href="{{ route('frontend.index') }}">Update Information</a></li>
            <li class="list-group-item"><a href="{{ route('dashboard.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
    </aside>
</div>
