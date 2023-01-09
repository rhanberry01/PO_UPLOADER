
<?php
ini_set('MAX_EXECUTION_TIME', -1);
set_time_limit(-1);
ini_set('memory_limit', '-1');
ini_set('MAX_EXECUTION_TIME', -1);
ini_set('mssql.connect_timeout',0);
ini_set('mssql.timeout',0);
set_time_limit(0);  
ini_set('memory_limit', -1);

defined('BASEPATH') OR exit('No direct script access allowed');


class Auto_model extends CI_Model {

     
	public function trans_begin($br){
        $this->db = $this->load->database($br, TRUE);
        $this->db->trans_begin();
    }

    public function trans_status($br){
        $this->db = $this->load->database($br, TRUE);
        $res = $this->db->trans_status();
        return $res;
    }

    public function trans_rollback($br){
        $this->db = $this->load->database($br, TRUE);
        $this->Auto_model_->trans_rollback();;
    }

    public function trans_commit($br){
        $this->db = $this->load->database($br, TRUE);
        $this->db->trans_commit();
    }
    
    public function escape_db($br,$fields){
        $this->db = $this->load->database($br, TRUE);
        $res = $this->db->escape($fields);
        return $res;
    }


	public function get_unposted_transit(){
		$this->db = $this->load->database('main', true);
	 	$sql = "SELECT po_no FROM receiving_new.0_receive_po44sup_transfer
		 where  posted = 0";
	
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
	}

	public function get_posted_transit($imploded_val){
		$this->db = $this->load->database('default', true);
	 	$sql = "select DISTINCT PurchaseOrderNo from srs.central_received_history
		 where PurchaseOrderNo IN
		 (".$imploded_val.")";
	
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
	}
	
	 public function get_all_branches($branch = array(),$num=array()){
	 	// $branch = array('srscain','srspun','srspat','srscain2','srssanp','srstu');
	 	$not_in = array('srsbatasan',
		 'srsdeparo',
		 'srsllano',
		 'srssanana',
		 'srstala',
		 'srspalay',
		 'srsmr');
		$this->db = $this->load->database('default', true);
		$this->db->trans_start();
		$this->db->select('code, ip, name,srs_po_db,db_100');
		$this->db->from('branches');
		$this->db->where('inactive',0);
		$this->db->where_not_in('code',$not_in);
		if($branch){
			$this->db->where_in('code',$branch);
		}
		if($num =='even'){
			$this->db->where('(id % 2) = 0',null,false);
		}
		if($num =='odd'){
			$this->db->where('(id % 2) > 0',null,false);
		}
		$query = $this->db->get();
		$result = $query->result();
		$this->db->trans_complete();	
		return $result;
	}


	 public function get_default_excludes($branch=null,$ls=null){
	 	$this->db = $this->load->database('datacenter', true);
	 	$sql = "select productid,vendorproductcode,vendorcode from $branch.dbo.VENDOR_Products where vendorproductcode in 
	 			('".$ls."') ";
	 			
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
	 }


	 public function get_excludes($po_db=null){
	 	$this->db = $this->load->database('default', true);
	 	$sql = "SELECT DISTINCT VendorProductCode  FROM $po_db.exclude_items ";
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();


	 }


	 public function get_transfer_in_history(){
	 	$datess = date('Y-m-d', strtotime(date('Y-m-d') . ' -3 day'));
	 	$this->db = $this->load->database('main', true);
	 	$sql = "SELECT transfer_id,a.br_code_in,cast(a.transfer_in_date as date) AS transfer_in_date,b.barcode,b.stock_id_2 FROM transfers.0_transfer_header as a LEFT JOIN
			transfers.0_transfer_details  as b on a.id = b.transfer_id
			where cast(a.transfer_in_date as date) >='".$datess."' and qty_in != 0 ";

		//return $sql;
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }

	 }

	 public function get_vendor_modified($branch=null,$productcode=null){
		$this->db = $this->load->database('datacenter', true);
		$sql = "select * from SRSMNOVA.dbo.vendor where cast(LASTDATEMODIFIED as date) >='".date('Y-m-d', strtotime('-10 days'))."'";
		$result = $this->db->query($sql);
		   $result = $result->result();
		   if($result){
			   return $result;
		   }else{
			   return false;
		   }
	   $this->db->trans_complete();

	}

	 public function get_stock_id($branch=null,$productcode=null){
	 	$this->db = $this->load->database('datacenter', true);
	 	$sql = "select p.CostOfSales,pp.ProductID,vp.Description,vp.uom,vp.VendorProductCode as Barcode from $branch.dbo.VENDOR_Products as vp
				LEFT JOIN $branch.dbo.POS_Products as pp on vp.VendorProductCode = pp.Barcode
				LEFT JOIN $branch.dbo.Products as p on vp.ProductID = p.ProductID
				where VendorProductCode ='$productcode' and defa = 1";
	 	$result = $this->db->query($sql);
            $result = $result->row();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();

	 }

	 public function update_expired_pl(){
	 	$this->db = $this->load->database('main', true);
	 	$sql = "UPDATE  `0_transfer_header` SET inactive = 1 where memo_ like '%AUTO SUGGESTED TO PL%' and `inactive` =0
					and DATE_ADD(date_created,INTERVAL 7 Day) < CURDATE() and m_id_out = 0";
		$this->db->trans_start();
		 $result = $this->db->query($sql);
		$this->db->trans_complete();

	 
	 }

	 public function get_db_133_in_transfers(){
	 	$this->db = $this->load->database('main', true);
	 	$sql = "SELECT `code`,db_133 FROM transfers.`0_branches` where inactive = 0";
		$this->db->trans_start();

		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;

	 }

	 public function upd_details_to_pl($sql){
	 	$this->db = $this->load->database('default', true);
		$this->db->query($sql);
	 }


	 public function get_details_to_pl($to_branch,$from_branch,$xpl){

	 	$this->db = $this->load->database('default', true);
		$sql = "SELECT * FROM `suggested_to_auto_pl` where to_branch = '".$to_branch."' 
		and from_branch = '".$from_branch."' and pl_no is null and productcode not in(".$xpl.")";

		$this->db->trans_start();

		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;
	 }

	 
	 public function get_exclude_to_pl(){
	 	$this->db = $this->load->database('datacenter', true);
		$sql = "select ProductCode from SRSMNOVA.dbo.Products where LevelField1Code in(
		'9041',
		'9013',
		'10056',
		'10057',
		'10058',
		'10059',
		'10060',
		'10061',
		'10062',
		'10063',
		'10064'
	)";
		$this->db->trans_start();

		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;

	 }

	 public function get_suggested_branch_to_pl(){
		
		$this->db = $this->load->database('default', true);
		$sql = "SELECT  from_branch,to_branch FROM `suggested_to_auto_pl` where pl_no is null GROUP BY from_branch,to_branch ORDER BY from_branch";
		$this->db->trans_start();

		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;
	 }


	 public function processing_modified_data($br_code=null,$past_date = null,$main){
	 	if($main == 1){
		 	$this->db = $this->load->database('default', true);
		 	$sql = "select * from purch_orders
				where cast(lastdatemodified as date) >='".$past_date."' and 
				order_no IN
				(select trans_id FROM refs as r
				INNER JOIN purch_orders as pord
				on r.trans_id = pord.order_no and r.trans_type = pord.trans_type 
				where  r.trans_type ='16'  )  
				AND trans_type = '16' ORDER BY lastdatemodified desc";
	 	}else{ //and r.throw = 1
		 	$this->db = $this->load->database('default', true);
		 	$sql = "select * from purch_orders
				where cast(lastdatemodified as date) >='".$past_date."' and 
				order_no IN
				(select trans_id FROM refs as r
				INNER JOIN purch_orders as pord
				on r.trans_id = pord.order_no and r.trans_type = pord.trans_type 
				where br_code ='".$br_code."' and r.trans_type ='16' )  
				AND trans_type = '16' ORDER BY lastdatemodified desc";
	 	}

	 	$this->db->trans_start();
		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;


	 }





	  public function update_modified_purch($data = array(),$trans_type = null,$order_no = null,$br = null,$main= null){
	 	if($main == 1){
		 	$this->db = $this->load->database('main', true);
	 	}else{
		 	$this->db = $this->load->database($br, true);
	 	}
	 	$this->db->trans_start();
	 	$this->db->where('order_no', $order_no);
	 	$this->db->where('trans_type', $trans_type);
		$this->db->update('purch_orders', $data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();			
		    return "Rollback";

		}else{

			$this->db->trans_commit();
		    $this->db->trans_complete();
		    return "Commit";

		}
	 	$this->db->trans_complete();
	 }

	 public function insert_transfer_header($sql_refs){
		 	$this->db = $this->load->database('main', true);
		 	$this->db->query($sql_refs);
		 	return $this->db->insert_id();

	 }

	  public function insert_transfer_history($sql_refs){
		 	$this->db = $this->load->database('default', true);
		 	$this->db->query($sql_refs);
		 	return $this->db->insert_id();

	 }

	 public function insert($sql_refs = null,$sql_purch_orders = null,$sql_purch_order_details = null,$br = null,$main = null){
	 	if($main == 1){
		 	$this->db = $this->load->database('main', true);
	 	}else{
		 	$this->db = $this->load->database($br, true);
		 	echo $br.'<-branch';
	 	}
		$this->db->trans_start();
		$arr = array();
		$refs = $this->db->query($sql_refs);
			if(!$refs){
				$arr[] = 'err-refs'.$refs;
			}
		$purch = $this->db->query($sql_purch_orders);
			if(!$purch){
				$arr[] = 'err-purch'.$purch;
			}
		$purch_det = $this->db->query($sql_purch_order_details);
			if(!$purch_det){
				$arr[] = 'err-purch_det'.$purch_det;
			}

		if ($this->db->trans_status() === FALSE)
		{
			 $this->db->trans_rollback();			
		    return "Rollback".var_dump($arr);

		}else{

		    $this->db->trans_commit();
		    $this->db->trans_complete();
		    return "Commit";
		}

	 }




	 public function get_refs($unthrow_refs=null,$main){
	 	if($main == '1'){
			$this->db = $this->load->database('default', true);
	 	}else{
			$this->db = $this->load->database('main', true);
	 	}
	 	$this->db->trans_start();
	 	$sql = "select * from refs where trans_id IN('".$unthrow_refs."') and trans_type ='16' and  throw = 0";
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;	

	 }
	 
	 #expried po
	 public function update_expired_po($freq,$day){
	 	$this->db = $this->load->database('default', true);
		$now = date('Y-m-d');
	 	$this->db->trans_start();
	 	$sql = "UPDATE  purch_orders as p
				RIGHT JOIN supplier_frequency as f on 
				f.branch = p.br_code and f.supplier = p.supplier_id and  p.trans_type =16
				SET p.`status` =  3
				where  p.trans_date >='2021-03-30' and f.resume = 1 and  f.frequency ='".$freq."' 
				and p.`status` = 0  and p.`status` != 3 and auto_generate = 1
				and p.order_no not in(SELECT trans_id FROM `reactivated_po` where `type` = 2 and po_validity >='".$now."')
				and DATE_ADD(p.trans_date,INTERVAL $day DAY) < CURRENT_DATE()";
	 	$result = $this->db->query($sql); //and p.auto_generate = 1
	 //	echo $sql;
		$this->db->trans_complete();
		return $result;	


	 }

	 ##manual

	  public function update_expired_po_manual($freq,$day){
	 	$this->db = $this->load->database('default', true);
	 	$this->db->trans_start();
	 	$sql = "UPDATE purch_orders set `status` = 3 
				where order_no IN
				(
				select b.order_no from 
				(
				SELECT 
				p.order_no,
				CASE 
				WHEN DATE_ADD(p.trans_date,INTERVAL 1 DAY) > p.delivery_date 
				THEN DATE_ADD(p.trans_date,INTERVAL 29 DAY) 
				ELSE p.delivery_date END as aa  FROM purch_orders as p  
				where  p.trans_date >='2021-03-30'   and p.`status` = 0  and p.`status` != 3 
				and auto_generate = 0 and p.trans_type =16
				and p.order_no not in(SELECT trans_id FROM `reactivated_po` where `type` = 2 and po_validity >='".$now."')
				HAVING aa < CURDATE() ) as b) and trans_type = '16'
				";
	 	$result = $this->db->query($sql); //and p.auto_generate = 1
	 //	echo $sql;
		$this->db->trans_complete();
		return $result;	


	 }
	 
	 
	 #expried po


	 public function get_purch_order_details($unthrow_refs=null,$main= null){
	 	if($main == 1){
	 		$this->db = $this->load->database('default', true);
	 	}else{
	 		$this->db = $this->load->database('main', true);
	 	}
	 	$this->db->trans_start();
	 	$sql = "select * from purch_order_details where order_no IN ('".$unthrow_refs."') and trans_type = 16";
	 	$result = $this->db->query($sql);
         $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;	
            }	
		$this->db->trans_complete();
		return $result;	
	 }



	 public function get_purch_orders_by_supplier($suppliers=null,$date){
	 	$this->db = $this->load->database('default', true);
	 	$this->db->trans_start();
	 	$sql = "select 
	 			po.trans_date,
				po.order_no,
				po.supplier_id,
				po.supplier_name,
				pod.description,
				pod.barcode,
				r.reference,
				pod.ord_qty,
				pod.unit_id,
				pod.unit_price,
				pod.discounts,
				po.delivery_date,
				(select CONCAT(fname,' ',lname) from users where id = r.user_id limit 1) as users,
				(select `name` from branches where `code` = po.br_code) as br_name
				from purch_orders as po INNER JOIN 
				purch_order_details as pod on po.trans_type = pod.trans_type and po.order_no = pod.order_no 
				INNER JOIN refs as r on r.trans_id = po.order_no and r.trans_type =  po.trans_type 
				where po.trans_type = 16 and po.supplier_id in(".$suppliers.") 
				and cast(po.trans_date as date) <= '".$date."'
				and cast(po.trans_date as date) >= '".$date."'
				order by r.reference
				";
		//echo $sql;
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;	
	 }


	 public function get_purch_orders($unthrow_refs=null,$main){
	 	if($main == 1){
	 		$this->db = $this->load->database('default', true);
	 	}else{
	 		$this->db = $this->load->database('main', true);
	 	}
	 	$this->db->trans_start();
	 	$sql = "select * from purch_orders where order_no IN ('".$unthrow_refs."') and trans_type = 16";
	 	$result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;	

	 }

	  public function global_update_throw($unthrow_refs = null,$table = null, $fields = null){
	 	$this->db = $this->load->database('default', true);
	 	$this->db->trans_start();
	 	$sql = "update $table
	 			set   throw = 1
	 			where $fields in ('".$unthrow_refs."')
	 			";
	 	
	 	$result = $this->db->query($sql);
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();			
		    return "Rollback";

		}else{

			$this->db->trans_commit();
		    $this->db->trans_complete();
		    return "Commit";
		}



	  }


	  public function update_throw($unthrow_refs = null,$main){
	  	if($main == 1){
	 		$this->db = $this->load->database('default', true);
	 	}else{
	 		$this->db = $this->load->database('main', true);
	 	}
	 	$this->db->trans_start();
	 	$sql = "update refs
	 			set  throw  = 1
	 			where trans_id in ('".$unthrow_refs."')
	 			";
	 	
	 	$result = $this->db->query($sql);
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();			
		    return "Rollback";

		}else{

			$this->db->trans_commit();
		    $this->db->trans_complete();
		    return "Commit throw updated (main: '".$main."') ";

		}
	 	$this->db->trans_complete();

	  }



	 public function get_unthrow_refs($br_code=null,$main_brcode){

	 	if($br_code =='main'){

			$this->db = $this->load->database('default', true);
	 		//$sql = "select trans_id as order_no from refs where trans_type ='16' and throw = 0  ORDER BY order_no desc limit 1000 ";
	 		$sql = "select order_no from purch_orders
					where order_no IN
					(select trans_id FROM refs as r
					INNER JOIN purch_orders as pord
					on r.trans_id = pord.order_no and r.trans_type = pord.trans_type 
					where br_code ='".$main_brcode."' and r.trans_type ='16'  and r.throw = 0)  
					AND trans_type = '16' and trans_type  = '16'  and trans_date >='".date('Y-01-01')."'
					ORDER BY order_no desc limit 500 ";
			//echo $sql;
	 	}else{

			$this->db = $this->load->database('main', true);
	 		$sql = "select order_no from purch_orders
					where order_no IN
					(select trans_id FROM refs as r
					INNER JOIN purch_orders as pord
					on r.trans_id = pord.order_no and r.trans_type = pord.trans_type 
					where br_code ='".$br_code."' and r.trans_type ='16'  and r.throw = 0)  
					AND trans_type = '16' and trans_type  = '16' and trans_date >='".date('Y-01-01')."'
					ORDER BY order_no desc limit 500 ";

	 	}

	 	$this->db->trans_start();
		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;

	 }
	 public function get_branch($br_code=null){
	 	$this->db = $this->load->database('default', true);
 		$sql = "select * from branches ";
 		$this->db->trans_start();
		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;


	 }

	 public function get_supp_freq_det($unthrow_freq,$branch_code){

	 	$this->db = $this->load->database('default', true);
 		$sql = "select * from supplier_frequency_items where supplier_frequency_id in('".$unthrow_freq."') ";
 		$this->db->trans_start();
		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){	
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;


	 }


	 public function get_supp_freq_refs($branch_code,$refs,$table){
	 	$this->db = $this->load->database('default', true);
 		$sql = "select $refs as id from $table where ";
 		if($branch_code != ''){
 			$sql .= "branch = '".$branch_code."'"; 
 		}else{
			$sql .= " id IS NOT NULL"; 
		}
 		if($table == ' supplier_frequency'){
 		//	$sql .=" and (throw = 0 or date_edited >='".date('Y-m-d', strtotime('-100 days'))."' )";
		}
		/*else{
 			$sql .=" and (throw = 0 or  throw = 1)";
 		}*/

 		echo $sql.PHP_EOL;
 		$this->db->trans_start();
		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;

	 }

	 public function get_supp_freq($unthrow_freq,$branch_code){
	 	$this->db = $this->load->database('default', true);
 		$sql = "select * from supplier_frequency where branch = '".$branch_code."' ";
		// and id in('".$unthrow_freq."') 
 		$this->db->trans_start();
		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;
	 }

	 public function global_gathering_refs($unthrow_freq,$table,$where_field){
	 	$this->db = $this->load->database('default', true);
 		$sql  ="select * from $table where  $where_field";
 		if($unthrow_freq){
 			$sql .=" in('".$unthrow_freq."') ";
 		}
 		$sql .=" and throw = 0 or throw = 1 ";
 		//echo $sql;
 		$this->db->trans_start();
		 $result = $this->db->query($sql);
            $result = $result->result();
            if($result){
                return $result;
            }else{
                return false;
            }
		$this->db->trans_complete();
		return $result;
	 }



	 public function check_stat($br){
	 	$this->db = $this->load->database($br.'_migration', true);
	 	if ($this->db->trans_status() === FALSE)
		{
			 $this->db->trans_rollback();			
		    return "Rollback";

		}else{

		    $this->db->trans_commit();
		   
		    return "Commit";
		}

	 }

	 public function check_stat_main($br){
	 	$this->db = $this->load->database('default', true);
	 	if ($this->db->trans_status() === FALSE)
		{
			 $this->db->trans_rollback();			
		    return "Rollback";

		}else{

		    $this->db->trans_commit();
		   
		    return "Commit";
		}

	 }

	  public function global_query_main($sql){
		 $this->db = $this->load->database('default', true);	
	 	// $this->db->trans_start();
	 	 $res = $this->db->query($sql);
	 	 if($res){
	 	 	return true;
	 	 }else{
	 	 	return false;
	 	 }
	 	// $this->db->trans_complete();
	 }
	 

	 public function global_insert($br,$sql){
		 $this->db = $this->load->database($br.'_migration', true);	
	 	// $this->db->trans_start();
	 	 $res = $this->db->query($sql);
	 	 if($res){
	 	 	return true;
	 	 }else{
	 	 	return false;
	 	 }
	 	// $this->db->trans_complete();
	 }

	 public function global_delete($br,$sql){
		 $this->db = $this->load->database($br.'_migration', true);	
	 	// $this->db->trans_start();
	 	 $res = $this->db->query($sql);
	 	 if($res){
	 	 	return true;
		//	  $this->db->trans_complete();
	 	 }else{
	 	 	return false;
	 	 }
	 	 
	 }


}
