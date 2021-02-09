<?php

echo "<input type='text' id='role_id' value='".$this->uri->segment(3)."'>";
foreach ($menu_list as $menu) {
$sub_menu = $this->menu_m->get_menu_child_list($menu->id);

						
echo "<fieldset style='border: 1px solid #01b2c6; padding: 5px;'><legend>".$menu->menu_parent_name."</legend>";

	echo "<div><h5 style='font-weight:300'; font-size:13px;>";
foreach ($sub_menu as $sub) {
	echo "<input type='checkbox' id='menu_child_id".$sub->id."' value='".$sub->id."' onclick='assign_menu_to_role(".$sub->id.")'> ".$sub->menu_child_name." ";
}
echo "</h5></div>";


echo "</fieldset>";
//var_dump($sub_menu);
}
 ?>