<?php

foreach ($menu_list as $menu) {
$sub_menu = $this->menu_m->get_menu_child_list($menu->id);
echo $menu->menu_parent_name."<br>";
}
 ?>