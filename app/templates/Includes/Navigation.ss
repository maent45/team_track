<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
			<% loop $Menu(1) %>
      <li class="nav-item">
        <a class="nav-link" href="$Link">$Title</a>
      </li>
			<% end_loop %>
    </ul>
  </div>
</nav>
