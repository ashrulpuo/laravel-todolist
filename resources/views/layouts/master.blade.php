
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Laravel To-do-list</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../../dist/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Laravel To-do-list</a>
      <ul class="right hide-on-med-and-down">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <li><span>Logged as <b>{{ Auth::user()->name }}</b></span></li>&nbsp;
          <button class="btn waves-effect waves-light waves-light red" type="submit">Logout
            <!-- <i class="material-icons right">send</i> -->
          </button>
        </form>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Logged as <b>ashrul</b></a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      @isAdmin
      @if($invitations->count()>0)
      <ul class="collapsible">
        <li>
          <div class="collapsible-header">
            <i class="material-icons">person_add</i>
            Invitations
            <span class="new badge">{{ $invitations->count() }}</span>
          </div>
          <div class="collapsible-body">
            @foreach($invitations as $invite)
            <p>
              <span class="red-text"><b>{{ $invite->worker->name }}</b><a href="{{ route('acceptInvitation',['id'=>$invite->id]) }}">accept</a> | <a href="{{ route('denyInvitation',['id'=>$invite->id]) }}">deny</a></span>
            </p>
            @endforeach
          </div>
        </li>
      </ul>
      @endif
      @endisAdmin
      <br><br>

      <h1 class="center-align red-text text-darken-4">To-do List Apps</h1>

      @yield('content')
      
      <br><br>
    </div>
  </div>


  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <p class="grey-text text-lighten-4">Ui using materializecss.can use want ever u want </p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2014 Copyright ashrul
        <a class="grey-text text-lighten-4 right" href="https://github.com/ashrulpuo/" target="_blank">https://github.com/ashrulpuo/</a>
      </div>
    </div>
  </footer>

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.collapsible');
      var options;
      var instances = M.Collapsible.init(elems, options);
    });

    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });
  </script>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
