		</div>
		<td class="right">
		<div>
		</div>
		</td>
	</tr>

	<tr id="bottom">
			
		<td class="left">
		<div>
		</div>
		</td>
				
		<td class="center">
		<div>
		</div>
		</td>
				
		<td class="right">
		<div>
		</div>
		</td>
				
	</tr>
	</table>
			
<script>
function navFix() {
    var i, navUnit, width, image, nav, navHeight, topCenterEdge, cellHeight;
    for (i = 0; i < 4; i = i + 1) {
        navUnit = document.getElementsByClassName("navUnit")[i];
        width = navUnit.getElementsByTagName("a")[0].offsetWidth;

        image = navUnit.getElementsByTagName("img")[0];
        image.style.width = width + 'px';
        image.style.height = '1.7em';
    }

    nav = document.getElementById("nav");
    navHeight = nav.offsetHeight;

    topCenterEdge = document.getElementById("header");
    cellHeight = topCenterEdge.offsetHeight;

    nav.style.marginTop = (cellHeight - navHeight - 3) + 'px';
}

function shift() {
    this.style.top = '3px';
    this.style.left = '-3px';
}

function unShift() {
    "use strict";
    this.style.top = '0px';
    this.style.left = '0px';
}

function eventListeners() {
    var i, navUnit;
    for (i = 0; i < document.getElementsByClassName("navUnit").length; i = i + 1) {
        navUnit = document.getElementsByClassName("navUnit")[i];
        navUnit.onmouseover = shift;
        navUnit.onmouseout = unShift;
    }
}

function loader() {
    navFix();
    eventListeners();
}

window.onload = loader;
</script>
</body>
</html>