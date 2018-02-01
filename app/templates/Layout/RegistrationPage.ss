$Form

<% if $Profiles %>
  <% loop $Profiles %>
    $ID
    <a href="$Link">$ID</a>
  <% end_loop %>
<% end_if %>