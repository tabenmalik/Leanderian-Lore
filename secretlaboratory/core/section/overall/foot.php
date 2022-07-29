					</div>
				</td>
				
				<td id="right">
					<?php
						if(loggedIn())
						{
							require_once $DIR_PATH.'core/section/aside.php';;
						}
					?>
				</td>
			</tr>

			<tr id="bottom">
				<td colspan="2">
					<?php
						if(loggedIn())
						{
							require_once $DIR_PATH.'core/section/footer.php';
						}
					?>
				</td>
			</tr>
	</body>
</html>