<?php
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{	
		if($_POST['member_level']!=0)
		{
			if(isset($_POST['rf']) && !empty($_POST['rf']))
			{
				$upd = $manageData->updateValueWhere('member_level_info','RF',$_POST['rf'],'member_level',$_POST['member_level']);
			}	
			if(isset($_POST['pc']) && !empty($_POST['pc']))
			{
				$upd = $manageData->updateValueWhere('member_level_info','PC',$_POST['pc'],'member_level',$_POST['member_level']);
			}
			if(isset($_POST['pv']) && !empty($_POST['pv']))
			{
				$upd = $manageData->updateValueWhere('member_level_info','promotion_pv',$_POST['pv'],'member_level',$_POST['member_level']);
			}	
			if(isset($_POST['ps']) && !empty($_POST['ps']))
			{
				$upd = $manageData->updateValueWhere('member_level_info','PS',$_POST['ps'],'member_level',$_POST['member_level']);
			}
		}
		
		if(isset($_POST['of']) && !empty($_POST['of']))
		{
			$upd = $manageData->updateValueWhere('member_level_info','OF',$_POST['of'],'member_level',$_POST['member_level']);
		}
		
	}
	header("Location: ../../member-level-list.php");
?>