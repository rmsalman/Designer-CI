<?php
/**
*@if(CheckPermission('crm', 'read'))
**/
 function CheckPermission($moduleName="", $method=""){
	 $CI = get_instance();
    $permission = isset($CI->session->get_userdata()['user_details'][0]->user_type)?$CI->session->get_userdata()['user_details'][0]->user_type:'';
    if(isset($permission) && $permission != "" ) 
	{
		
        if($permission == 'admin' || $permission == 'Admin') 
		{
          return true;
        } 
		else 
		{	
			$getPermission = array();
			$getPermission = json_decode(getRowByTableColomId('permission',$permission,'user_type','data'));
			
			
			if (isset($getPermission->$moduleName)) 
			{	
			 
			  if(isset($moduleName) && isset($method) && $moduleName != "" && $method != "" )
			  {		
			  		
			  	   $method_arr = explode(',',$method);
			  	   foreach($method_arr as $method_item){ 
				   if(isset($getPermission->$moduleName->$method_item))
				   {  
						return $getPermission->$moduleName->$method_item;
					}
				   
				} 
				//return 0;
              } 
			  else
			  {
                return 0;
              }
			}
			else{return 0;}
       }
    } 
	else 
	{
      return 0;
    }
  }

	function setting_all($keys='')
	{  
		$CI = get_instance();
		if(!empty($keys)){
			$CI->db->select('*');
			$CI->db->from('setting');
			$CI->db->where('keys' , $keys);
			$query = $CI->db->get();
			$result = $query->row();
			if(!empty($result)){
				 $result = $result->value;
				return $result;
			}
			else
			{
				return false;
			}
		}
		else{
			$CI->load->model('setting/setting_model');
			$setting= $CI->setting_model->get_setting();
			return $setting;
		}
		
	}


	function settings() {
		$CI = get_instance();
		$CI->load->model('setting/setting_model');
		$setting= $CI->setting_model->get_setting();
		$result = []; 
		foreach ($setting as $key => $value) {
			$result[$value->keys] = $value->value;
		}
		return $result;
	}

	function getRowByTableColomId($tableName='',$id='',$colom='id',$whichColom='')
	{  
		if($colom == 'id' && $tableName != 'users') {
			$colom = $tableName.'_id';
		}
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from($tableName);
		$CI->db->where($colom , $id);
		$query = $CI->db->get();
		$result = $query->row();
			if(!empty($result))
			{	
				if(!empty($whichColom)){
				 $result = $result->$whichColom;
				 return $result;
				}
				else
				{
					return $result;
				}
			}
			else
			{
				return false;
			}
	
	}


	function getOptionValue($keys='')
	{  
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from('setting');
		$CI->db->where('keys' , $keys);
		$query = $CI->db->get();
		
		if(!empty($query->row())){return $result = $query->row()->value;}else{return false;}

	}
	
	function getNameByColomeId($tableName='',$id='',$colom='id')
	{ 
		if($colom == 'id') {
			$colom = $tableName.'_id';
		} 
		$CI = get_instance();
		$CI->db->select($colom);
		$CI->db->from($tableName);
		$CI->db->where($tableName.'_id' , $id);
		$query = $CI->db->get();
		return $result = $query->row();

	}
	
	function selectBoxDynamic($field_name='', $tableName='setting',$colom='value',$selected='',$attr='')
	{   
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from($tableName);
		$query = $CI->db->get();
		if($query->num_rows() > 0) {
		   $catlog_data = $query->result();
		   $res = '';
			$res .='<select class="form-control" id="'.$field_name.'" name="'.$field_name.'" '.$attr.' >';
				foreach ($catlog_data as $catlogData){ 
				 $select_this = '';
				 	$tab_id = $tableName.'_id';
					if($catlogData->$tab_id == $selected){	$select_this = ' selected ';}
					$res .='<option value="'.$catlogData->$tab_id.'"  '.$select_this.' >'.$catlogData->$colom.'</option>';
				}
			$res .='</select>';
		}
		else 
		{
			$catlog_data = '';
			$res = '';
			$res .='<select class="form-control" id="'.$field_name.'" name="'.$field_name.'" '.$attr.' >';
			$res .='</select>';
		}
		return $res;
	}
		
	function fileUpload()
	{	
		$CI =& get_instance();
     	$CI->load->library('email');
		foreach($_FILES as $name => $fileInfo)
		{
			$filename=$_FILES[$name]['name'];
			$tmpname=$_FILES[$name]['tmp_name']; 
			$exp=explode('.', $filename);
			$ext=end($exp);
			$newname=  $exp[0].'_'.time().".".$ext; 
			$config['upload_path'] = 'assets/images/';
			$config['upload_url'] =  base_url().'assets/images/';
			$config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
			$config['max_size'] = '2000000'; 
			$config['file_name'] = $newname;
			$CI->load->library('upload', $config);
			move_uploaded_file($tmpname,"assets/images/".$newname);
			return $newname;
		}
	}
	
	  function is_login(){ 
	      if(isset($_SESSION['user_details'])){
	          return true;
	      }else{
	         redirect( base_url().'user/login', 'refresh');
	      }
	  }

  	function form_safe_json($json) {
	    $json = empty($json) ? '[]' : $json ;
	    $search = array('\\',"\n","\r","\f","\t","\b","'") ;
	    $replace = array('\\\\',"\\n", "\\r","\\f","\\t","\\b", "&#039");
	    $json = str_replace($search,$replace,$json);
	    return strip_tags($json);
	}
	function CallAPI($method, $url, $data = false)
  {   
	  $curl = curl_init();
	  switch ($method)
	  {   
		  case "POST":
			  curl_setopt($curl, CURLOPT_POST, 1);
			  if ($data)
				  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			  break;
		  case "PUT":
			  curl_setopt($curl, CURLOPT_PUT, 1);
			  break;
		  default:
			  if ($data)
				  $url = sprintf("%s?%s", $url, http_build_query($data));
	  }
	  curl_setopt($curl, CURLOPT_HTTPHEADER, array());
	  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	  curl_setopt($curl, CURLOPT_USERPWD, "");
	  curl_setopt($curl, CURLOPT_URL, $url);
	  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	  $result = curl_exec($curl);
	  curl_close($curl);
	  return $result;
  }
   	function getDataByid($tableName='',$columnValue='',$colume='')
	{  
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from($tableName);
		$CI->db->where($colume , $columnValue);
		$query = $CI->db->get();
		return $result = $query->row();
	}
	function getAllDataByTable($tableName='',$columnValue='*',$colume='')
	{  
		$CI = get_instance();
		$CI->db->select($columnValue);
		$CI->db->from($tableName);
		$query = $CI->db->get();
		if($query->num_rows() > 0) {
		   $catlog_data = $query->result();
			return $catlog_data;
		}else {return false;}
	}

	function ajx_dataTable($table='',$columns=array(),$Join_condition='', $where = '')
	{

		$table = $table;
    	$primaryKey = $table.'_id';
		$CI = get_instance();
		$CI->load->database();
		$CI->load->library('Ssp');
    	
			if(empty($columns))
			{
				$columns = array(
					array( 'db' => 'name', 'dt' => 0 ),	
					array( 'db' => $table.'_id',  'dt' => 1 )
					);
			}
			$sql_details = array(
				'user' => $CI->db->username,
				'pass' => $CI->db->password,
				'db'   => $CI->db->database,
				'host' => $CI->db->hostname
			);


		
		$output_arr = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $Join_condition, $where);
		
		foreach ($output_arr['data'] as $key => $value) 
		{
				$id = $output_arr['data'][$key][count($output_arr['data'][$key])  - 1];
				$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] = '';
				if(CheckPermission($table, "own_update")){
				$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a sty id="btnEditRow" class="modalButton mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
				}
				if(CheckPermission($table, "own_delete")){
				$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a data-toggle="modal" class="mClass" style="cursor:pointer;"  data-target="#cnfrm_delete" title="delete" onclick="setId('.$id.')"><i class="fa fa-trash-o" ></i></a>';}

		
			$result = getTemplatesByModule($CI->uri->segment(1));
			if(is_array($result) && !empty($result)) {
				$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<div class="btn-group"><a id="btnEditRow" class="mClass dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="javascript:;" type="button" data-src="" title="Edit"><i class="fa fa-download" data-id=""></i></a><ul class="dropdown-menu">';
				    foreach ($result as $value) {
					$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<li><a href="#">'.$value->template_name.'</a></li>';    	
				    }
				$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .=  '</ul> </div>';
			}
		}
		echo json_encode($output_arr);
    }

	  function getTemplatesByModule($module){
	  	$CI = get_instance();
	  	$CI->db->select('*');
	  	$CI->db->from('templates');
	  	$CI->db->where('module', $module);
	  	$qr = $CI->db->get();
	  	return $qr->result();
	  }

	
	

	  function geneeratePdf($module, $mid, $tid) {
	  	$CI = get_instance();
	  	$template_row = getDataByid('templates',$tid,'id');
	  	$module_row = getDataByid($module,$mid,'id');
	  	$CI->load->library('Mypdf');
	  	$html = $template_row->html;
	  	//print_r($module_row);
	  	foreach ($module_row as $key => $value) {
	  		$html = str_replace('{var_'.$key.'}', $value, $html);		
	  	}

		  $CI->dompdf->load_html($html);
		  $CI->dompdf->set_paper("A4", "portrait");
		  $CI->dompdf->render();
		  $filename = "mkaTestd.pdf";
		  $path = realpath(dirname(dirname(dirname(dirname(dirname(__FILE__)))))).'/assets/images/pdf/';
		  if(file_exists($path.$filename)) {
			  unlink($path.$filename);
		  }
		  file_put_contents($path.$filename, $CI->dompdf->output());
		  return  $path.$filename;
	  }




function status($status = '') {
  if($status == '0'){
    $status = 'Pause';
  }elseif($status == '1'){
    $status = 'In Progress';  
  }elseif($status == '2'){
    $status = 'Done';  
  }
  return $status;
}

													
													
													

function status_select($status = '') {
  if($status == '0'){
    $status = '<option value="0" selected="selected">Status Paused</option><option value="1">In Progress</option><option value="2">Done</option>';
  }elseif($status == '1'){
    $status = '<option value="0">Status Paused</option><option value="1" selected="selected">In Progress</option><option value="2">Done</option>';  
  }elseif($status == '2'){
    $status = '<option selected="selected" value="0">Status Paused</option><option value="1">In Progress</option><option value="2" selected="selected">Done</option>';  
  }else {
    $status = '<option value="0">Status Paused</option><option value="1">In Progress</option><option value="2" >Done</option>';    	
  }
  return $status;
}




  function check_admin(){ 
      if(isset($_SESSION['user_details'][0]->user_type) && $_SESSION['user_details'][0]->user_type == 'admin'){
          return true;
      }else{
      	redirect('dashboard');
      }
  }


  function is_admin(){ 
      if(isset($_SESSION['user_details'][0]->user_type) && $_SESSION['user_details'][0]->user_type == 'admin'){
          return true;
      }else{
      	return false;
      }
  }

  function is_designer(){ 
      if(isset($_SESSION['user_details'][0]->user_type) && $_SESSION['user_details'][0]->user_type == 'Designer'){
          return true;
      }else{
      	return false;
      }
  }

  function is_user(){ 
      if(isset($_SESSION['user_details'][0]->user_type) && $_SESSION['user_details'][0]->user_type == 'Member'){
          return true;
      }else{
      	return false;
      }
  }
  function user_type(){ 
      if(isset($_SESSION['user_details'][0]->user_type)){
          return $_SESSION['user_details'][0]->user_type;
      }else{
      	return false;
      }
  }

  function user_id(){ 
      if(isset($_SESSION['user_details'][0]->users_id)){
          return $_SESSION['user_details'][0]->users_id;
      }else{
      	return false;
      }
  }

  function get_user($id){
	 $CI = get_instance();
	return $CI->db->select('*')->from('users')->where('users_id', $id)->get()->row();
  }

  function get_users(){
	 $CI = get_instance();
	return $CI->db->select('*')->from('users')->get()->result();
  }


function notices(){

	$CI = get_instance();
	$data = [];
	$CI->load->model("Public_model"); 

	if(is_admin()){
	$status = 'read_status_admin';
	}elseif (is_user()) {
	$status = 'read_status';
	}elseif (is_designer()) {
	$status = 'read_status_designer';
	}

	$data = [];
	$data['all_recieved'] = $CI->Public_model->msgcounter('mailbox', 'send_to', user_id(), $status, 0);
	$data['all_plans'] = $CI->Public_model->all_plans(user_id());
	$data['all_comments'] = $CI->Public_model->all_counts('comments');
	$data['all_users'] = $CI->Public_model->all_counts('users');
	$data["pause_orders"]= $CI->Public_model->oders_by_status(user_id(), 0);
	$data["progress_orders"]= $CI->Public_model->oders_by_status(user_id(), 1);
	$data["completed_orders"]= $CI->Public_model->oders_by_status(user_id(), 2);


// echo '<pre>';
// print_r($data);
// exit;

	$data["done_orders"]= $CI->Public_model->oders_by_status(user_id(), 2);


      return $data;
}



function dash_notices(){
	$CI = get_instance();
	$data = [];
	$CI->load->model("Public_model"); 

    return $data;
}


	 function user_stats($status, $id) {
	$CI = get_instance();



		 $CI->db
  		->select('SUM(p.price) AS total_priced')
  		->join('users u','po.user_id = u.users_id')
  		->join('plans p','po.plan_id = p.id')
  		->from('plan_orders po');


  		if(!empty($id)){
  			$CI->db->where('po.user_id = '.$id);
  		}

  		return $CI->db->where('po.is_paid = '.$status)->get()->row();

  		
  	}
  	 function users_stats_so($status, $id = '') {
	$CI = get_instance();
		 $CI->db
  		->select('SUM(s.showcase_price) AS total_priced')
  		->join('showcases s','so.so_s_id = s.showcase_id')
  		->from('showcase_orders so');

  		if(!empty($id)){
  			$CI->db->where('so.so_user_id = '.$id);
  		}

  		return $CI->db->where('so.so_is_paid = '.$status)->get()->row();
  	}


  	function seen_status($status, $content = '', $title='') {
  		if($status == 0){

  			if(empty($title) ){
  				$title = 'Not Seen';
  			}
  			$response = '<span style="opacity:0;font-size:0;">0</span><span title="'.$title.'" style="height: 37px;display: block;width: 100%;" class="badge badge-roundless badge-danger pull-right">'.$content.'</span>';
  		}elseif ($status == 1) {

  			if(empty($title)){
  				$title = 'Seen';
  			}
  			$response = '<span style="opacity:0;font-size:0;">1</span><span title="'.$title.'" style="height: 37px;display: block;width: 100%;" class="badge badge-roundless badge-success pull-right">'.$content.'</span>';
  		}
  		return $response;

  	}


?>
