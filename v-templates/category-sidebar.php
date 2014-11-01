<?php
	//getting product category list
	$manageContent->getCategoryListInSidebar($level,$cat_id);
	//getting link for previous level
	if($level != 1)
	{
		echo '<p class="prod-name"><a href="'.$baseUrl.'products/" class="hvr-no-decortn color-inhrt">Back To Root Category</a></p>';
	}
?>