<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default --}}
        @yield('title', 'Book Selector')
    </title>

    <meta charset='utf-8'>
    <link href="/css/style.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
    @if(Session::get('flash_message') != null)
      <div class='flash_message'>{{ Session::get('flash_message') }}</div>
    @endif

    <header>
        <h1>Preferential Book Selector for Book Clubs</h1>
    </header>

    <menu>
      <div>
        <nav>
          <ul>
              <li><a href="/">Home</a></li>
              @if(Auth::check())
                 <li><a href='/books'>Books</a></li>
                 <li><a href="/meetings">Meetings</a></li>
                 <li><a href="/ballots">Ballots</a></li>
                 <li><a href="/groups">Groups</a></li>
                 @if(Auth::user()->group_id !== null)
                    <li><a href="/groups/show/{{Auth::user()->group_id}}">My Group</a></li>
                    @endif
                 <li><a href="/logout">Logout</a></li>
              @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
              @endif
              <li><a href="/about">About</a></li>
          </ul>
        </nav>
      </div>

    </menu>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>


    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
