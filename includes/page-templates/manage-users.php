<?php
/*
* Plugin Name:       TJG Users
* Template page:     manage-users.php
* Intended slug:    manage-users
*/

get_header();
?>

<header class="plugin-header">
	<h1>TJG Users</h1>
	<p>Manage and update TJG Agents</p>
</header>
<div class="users-container">
	<?php

	$agent_list = Tjg_Users::get_tjg_agents();

	foreach ($agent_list as $agent) {
		echo '<div class="user-container">';
		echo '<h2>' . $agent->display_name . '</h2>';
		echo '<p>' . $agent->user_email . '</p>';
		echo '<p>' . $agent->user_login . '</p>';
		echo '<p>' . $agent->user_registered . '</p>';
		echo '<p>' . $agent->user_status . '</p>';
		echo '<p>' . $agent->agent_number . '</p>';
		echo '</div>';
	}
	?>

</div>


<?php
// WP Footer
get_footer();
// End of Template
?>