					</div>
				</td>
				
				<td id="right">
					<?php
						if(loggedIn())
						{
							include_once 'core/section/aside.php';;
						}
					?>
				</td>
			</tr>

			<tr id="bottom">
				<td colspan="2">
					<?php
						if(loggedIn())
						{
							include_once 'core/section/footer.php';
						}
					?>
				</td>
			</tr>
	</body>
</html>