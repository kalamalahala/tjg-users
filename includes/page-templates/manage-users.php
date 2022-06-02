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
<div class="table-container">
	<table class="user-table">
		<thead class="user-table-header">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr class="user-table-row">
				<?php
				$output = new Tjg_Users;
				echo $output->get_tjg_agents;
				?>
				<td>John Doe</td>
				<td>email@email.com</td>
				<td>123-456-7890</td>
				<td>
					<a href="#" class="button">View</a>
					<a href="#" class="button">Edit</a>
					<a href="#" class="button">Delete Agent</a>
					<a href="#" class="confirm-delete button" hidden>Are you sure?</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>


<?php
// WP Footer
get_footer();
// End of Template
?>