<?php
function showError($errors,$name){
	if($errors->has($name)){
		echo '<div class="alert alert-danger mt-1">'.$errors->first($name).'</div>';
	}
}


function showcategory($cates,$parent_id,$char,$parent_child){
	foreach($cates as $key=>$value){
		if($value['parent_id']==$parent_id){
			if($value['id']==$parent_child){
				echo '<option value='.$value['id'].' selected>'.$char.$value['name'].'</option>';
			}else{
				echo '<option value='.$value['id'].'>'.$char.$value['name'].'</option>';
			}
			
			showCategory($cates,$value['id'],$char.'|--',$parent_child);
		}
	}	
}
function listCategory($cates,$parent_id,$char){
	
	foreach($cates as $key=>$value){
		$html='';
		if($value['parent_id']==$parent_id){
			$html='<div class="item-menu"><span>'.$char.$value['name'].'</span>';
			$html.='<div class="category-fix">';
			$html.='<a class="btn-category btn-primary" href="'.route('category.edit',['id'=>$value['id']]).'".><i class="fa fa-edit"></i></a>';
			$html.='<a class="btn-category btn-danger" href="'.route('category.delete',['id'=>$value['id']]).'"><i class="fas fa-times"></i></i></a>';

			$html.='</div>';
			$html.='</div>';
			echo $html;
			listCategory($cates,$value['id'],$char.'|--');
		}
	}	
}
?>