$Form

<% if $Profiles %>
  <ul>
      <% loop $Profiles %>
      <li>
        <a href="$Link">$Member.Email</a>
      </li>
    <% end_loop %>
  </ul>
<% end_if %>