<% if $getMembers %>
  <div>
    <ul>
      <% loop $getMembers %>
          <li>$Email</li>
          <% loop $ProfilePage %>
            <h1>$ID $URLSegment</h1>
          <% end_loop %>
      <% end_loop %>
    </ul>
  </div>
<% end_if %>
