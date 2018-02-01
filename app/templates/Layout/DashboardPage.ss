<% if $Profiles %>
  <% loop $Profiles %>
    <div class="card" style="width: 18rem;">
      <!--<img class="card-img-top" src="..." alt="Card image cap">-->
      <div class="card-body">
        <a href="$Link" class="btn btn-primary">
          <h5 class="card-title">$Member.Email</h5>
          <p class="card-text">
            $Member.FirstName
            $Member.Surname - $Member.Role
          </p>
        </a>
      </div>
    </div>
  <% end_loop %>
<% end_if %>

