<h1>{{ $profile['name'] }}'s GitHub Profile</h1>
<img src="{{ $profile['avatar'] }}" alt="{{ $profile['name'] }}" width="100">
<p>Nickname: {{ $profile['nickname'] }}</p>
<p>Email: {{ $profile['email'] }}</p>

<h2>Public Repositories</h2>
<ul>
    @foreach($repositories as $repo)
        <li>{{ $repo['name'] }} - <a href="{{ $repo['html_url'] }}" target="_blank">View on GitHub</a></li>
    @endforeach
</ul>
