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
	<pre>
	<?php

	$agent_number_search = $_GET['agent_id'] ?? null;
	
	$agent_list = Tjg_Users::get_tjg_agents( $agent_number_search );

	print count( $agent_list ) . ' agents found';

	?>
	</pre>
</div>


<?php
// WP Footer
get_footer();
// End of Template
?>