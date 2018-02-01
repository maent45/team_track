<% if $getMembers %>
  <div>
    <ul>
      <% loop $getMembers %>
          <li>$Email</li>
          <% loop $ProfilePage %>
            <a href="$URLSegment">Profile</a>
          <% end_loop %>
      <% end_loop %>
    </ul>
  </div>
<% end_if %>