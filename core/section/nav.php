<nav>
	<table>
		<tr>
			<td><a href="<?php echo $DIR_PATH; ?>"			>Lore</a></td>
			<td><a href="<?php echo $DIR_PATH; ?>library"	>Library</a></td>
			<td><a href="<?php echo $DIR_PATH; ?>jotw"		>JOTW</a></td>
			<td><a href="<?php echo $DIR_PATH; ?>about"		>About</a></td>
			<td><a href="<?php echo $DIR_PATH; ?>account"	>Account</a></td>
			<?php if(!isAdmin()){ ?>
			<td><a href="<?php echo $DIR_PATH; ?>contact"	>Contact</a></td>
			<?php } ?>
			<td><a href="<?php echo $DIR_PATH; ?>logout"	>Logout</a></td>
		</tr>
	</table>
</nav>