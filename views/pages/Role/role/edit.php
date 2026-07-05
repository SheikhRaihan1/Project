<?php
echo Page::title(["title"=>"Edit Role"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"role", "text"=>"Manage Role"]);
echo Page::context_open();
echo Form::open(["route"=>"role/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$role->id"]);
	echo Form::input(["label"=>"Role Name","type"=>"text","name"=>"role_name","value"=>"$role->role_name"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
