
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><?php echo $_SESSION['username']; ?>'s favourite countries</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav justify-between">
        <a class="nav-link active" aria-current="page" href="/">Home</a>
        <a class="nav-link" href="/favourites">Favourites</a>
        <a class="nav-link" href="/statistics">Statistics</a>
        <a class="nav-link" href="/logout?logout=true">Log out</a>
      </div>
    </div>
  </div>
</nav>