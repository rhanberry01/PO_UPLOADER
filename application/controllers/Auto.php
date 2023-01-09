<?php
ini_set('MAX_EXECUTION_TIME', -1);
set_time_limit(-1);
ini_set('memory_limit', '-1');
ini_set('MAX_EXECUTION_TIME', -1);
ini_set('mssql.connect_timeout',0);
ini_set('mssql.timeout',0);
set_time_limit(0);  
ini_set('memory_limit', -1);
//error_reporting(E_ERROR | E_PARSE);

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//client_buffer_max_kb_size = '50240'
//sqlsrv.ClientBufferMaxKBSize = 50240

class Auto extends CI_Controller {
	
	public function __construct(){		
		date_default_timezone_set('Asia/Manila');
		parent::__construct();
		$this->load->model("Auto_model");
		$this->load->library("excel");
	}


	public function trans_begin($br){
		$this->Auto_model->trans_begin($br);
	}

	public function trans_status($br){
		$res = $this->Auto_model->trans_status($br);
		return $res;
	}

	public function trans_rollback($br){
		$this->Auto_model->trans_rollback($br);
	}

	public function trans_commit($br){
		$this->Auto_model->trans_commit($br);
	}

	public function escape_db($br,$field){
		$this->Auto_model->escape_db($br,$field);
	}

	public function delete_coke_po(){
		$file_dir =  realpath(dirname(__FILE__). '/../../reports');
		foreach(glob($file_dir . '/*') as $file){
			// check if is a file and not sub-directory
			if(is_file($file)){
				// delete file
				unlink($file);
				echo 'delete';
			}
		}
	}


	public function coke_po(){
		$file_dir =  realpath(dirname(__FILE__). '/../../reports');
		$back_file_dir =  realpath(dirname(__FILE__). '/../../backup_reports');
		
		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$datefrom = date('Y-m-d');
		$dateto =date('Y-m-d');
		$objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex();
		$textFormat='0';//'General','0.00','@'
			$objPHPExcel->getActiveSheet()
			->getStyle('D')
			->getNumberFormat()
			->setFormatCode(
			   $textFormat
			);

		$objPHPExcel->getActiveSheet()->setCellValue('A1','Vendor Code');	
		$objPHPExcel->getActiveSheet()->setCellValue('B1','Vendor Name');	
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Item Description');	
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Barcode');	
		$objPHPExcel->getActiveSheet()->setCellValue('E1','PO Number');	
		$objPHPExcel->getActiveSheet()->setCellValue('F1','PO Qty');	
		$objPHPExcel->getActiveSheet()->setCellValue('G1','PO Price');	
		$objPHPExcel->getActiveSheet()->setCellValue('H1','PO Discounts');	
		$objPHPExcel->getActiveSheet()->setCellValue('I1','PO Amount');	
		$objPHPExcel->getActiveSheet()->setCellValue('J1','Schedule Delivery Date');
		$objPHPExcel->getActiveSheet()->setCellValue('K1','PO UOM');	
		$objPHPExcel->getActiveSheet()->setCellValue('L1','PO Created by');	
		$objPHPExcel->getActiveSheet()->setCellValue('M1','PO Branch');

	
		$suppliers = "'COCOBP002','COCOBP001','COCOTW002'";
		$date = date('Y-m-d');
		$purch_orders =  $this->Auto_model->get_purch_orders_by_supplier($suppliers,$date);
		if(!$purch_orders){
			exit();
		}
		//echo $purch_orders; die();
		$i = 1;
		$reference = "";
		$trans_date = "";
		$supp_name = "";
		$b=1;
		$c = count($purch_orders);
	//	echo 'count - '.$c.PHP_EOL;
		foreach ($purch_orders as $po) {
			# code...
			$i++;
			$b++;

			if($b > 2){
				if($reference != $po->reference){
					$objPHPExcel->getActiveSheet()->setTitle('PurchaseOrder');
					$objWriter->save($file_dir."/".str_replace(".","",$supp_name)."-".$reference.".xlsx");
					$objWriter->save($back_file_dir."/".str_replace(".","",$supp_name)."-".$reference.".xlsx");
					$objPHPExcel->disconnectWorksheets();
					$objPHPExcel->createSheet();
					$textFormat='0';//'General','0.00','@'
						$objPHPExcel->getActiveSheet()
						->getStyle('D')
						->getNumberFormat()
						->setFormatCode(
						   $textFormat
						);

					$objPHPExcel->getActiveSheet()->setCellValue('A1','Vendor Code');	
					$objPHPExcel->getActiveSheet()->setCellValue('B1','Vendor Name');	
					$objPHPExcel->getActiveSheet()->setCellValue('C1','Item Description');	
					$objPHPExcel->getActiveSheet()->setCellValue('D1','Barcode');	
					$objPHPExcel->getActiveSheet()->setCellValue('E1','PO Number');	
					$objPHPExcel->getActiveSheet()->setCellValue('F1','PO Qty');	
					$objPHPExcel->getActiveSheet()->setCellValue('G1','PO Price');	
					$objPHPExcel->getActiveSheet()->setCellValue('H1','PO Discounts');	
					$objPHPExcel->getActiveSheet()->setCellValue('I1','PO Amount');	
					$objPHPExcel->getActiveSheet()->setCellValue('J1','Schedule Delivery Date');
					$objPHPExcel->getActiveSheet()->setCellValue('K1','PO UOM');	
					$objPHPExcel->getActiveSheet()->setCellValue('L1','PO Created by');	
					$objPHPExcel->getActiveSheet()->setCellValue('M1','PO Branch');

						/*$objPHPExcel->getActiveSheet()->setCellValue('A1','PONo');	
						$objPHPExcel->getActiveSheet()->setCellValue('B1','PODate');	
						$objPHPExcel->getActiveSheet()->setCellValue('C1','POExpiry');	
						$objPHPExcel->getActiveSheet()->setCellValue('D1','StoreCode');	
						$objPHPExcel->getActiveSheet()->setCellValue('E1','StoreName');	
						$objPHPExcel->getActiveSheet()->setCellValue('F1','CustomerCode');	
						$objPHPExcel->getActiveSheet()->setCellValue('G1','CustomerName');	
						$objPHPExcel->getActiveSheet()->setCellValue('H1','ItemCode');	
						$objPHPExcel->getActiveSheet()->setCellValue('I1','UPC');	
						$objPHPExcel->getActiveSheet()->setCellValue('J1','Description');	
						$objPHPExcel->getActiveSheet()->setCellValue('K1','Quantity');	
						$objPHPExcel->getActiveSheet()->setCellValue('L1','UOM');*/


					$i=2;
					
				}

				
			}

			/*$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$po->reference);	
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,date('m/d/Y',strtotime($po->trans_date)));	
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,date('m/d/Y',strtotime($po->delivery_date)));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,'?');	
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,'?');	
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,'?');	
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,'?');	
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i,'?');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$po->barcode);
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$po->description);
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i,$po->ord_qty);
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$i,$po->unit_id);*/

			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$po->supplier_id);	
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$po->supplier_name);	
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$po->description);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$po->barcode);	
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$po->reference);	
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$po->ord_qty);	
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$po->unit_price);	
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$po->discounts);

			$discTxt = "";
			$total = $po->ord_qty *$po->unit_price;
            if($po->discounts != "" || $po->discounts != 0){
                $discounts = explode(',', $po->discounts);
                foreach ($discounts as $discs) {
                    $disc = explode('=>',$discs);
                    if (count($disc) <= 1)
                        continue;
                    $discTxt .= $disc[0];
                    $total -= $disc[1];
                }
            }

			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$total);	
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$po->delivery_date);	
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i,$po->unit_id);	
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$i,$po->users);	
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$i,$po->br_name);	

			$reference = $po->reference;
			$trans_date = $po->trans_date;
			$supp_name = $po->supplier_name;
		}

		$objPHPExcel->getActiveSheet()->setCellValue('A1','Vendor Code');	
		$objPHPExcel->getActiveSheet()->setCellValue('B1','Vendor Name');	
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Item Description');	
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Barcode');	
		$objPHPExcel->getActiveSheet()->setCellValue('E1','PO Number');	
		$objPHPExcel->getActiveSheet()->setCellValue('F1','PO Qty');	
		$objPHPExcel->getActiveSheet()->setCellValue('G1','PO Price');	
		$objPHPExcel->getActiveSheet()->setCellValue('H1','PO Discounts');	
		$objPHPExcel->getActiveSheet()->setCellValue('I1','PO Amount');	
		$objPHPExcel->getActiveSheet()->setCellValue('J1','Schedule Delivery Date');
		$objPHPExcel->getActiveSheet()->setCellValue('K1','PO UOM');	
		$objPHPExcel->getActiveSheet()->setCellValue('L1','PO Created by');	
		$objPHPExcel->getActiveSheet()->setCellValue('M1','PO Branch');



		$objPHPExcel->getActiveSheet()->setTitle('PurchaseOrder');

		$objWriter->save($file_dir."/".str_replace(".","",$supp_name)."-".$reference.".xlsx");
		$objWriter->save($back_file_dir."/".str_replace(".","",$supp_name)."-".$reference.".xlsx");
		
	}



	public function update_expired_po(){
		
		$this->Auto_model->update_expired_po('F1','30');
		echo 'F1 UPDATED';
		$this->Auto_model->update_expired_po('F5','30');
		echo 'F5 UPDATED';
		$this->Auto_model->update_expired_po('F6','30');
		echo 'F6 UPDATED';
		$this->Auto_model->update_expired_po('F7','30');
		echo 'F7 UPDATED';
		$this->Auto_model->update_expired_po('F2','14');
		echo 'F2 UPDATED';
		$this->Auto_model->update_expired_po('F4','7');
		echo 'F4 UPDATED';

		$this->Auto_model->update_expired_po_manual();
		echo 'MANUAL PO UPDATED';


	}
	

	public function update_transfer_in(){
			$sql_trans_history_refs = array();
			$res =  $this->Auto_model->get_transfer_in_history();
			$sql_trans_history = "INSERT IGNORE INTO central_stock_transfer_in (transfer_id,br_code_in,transfer_in_date,date_added,barcode,stock_id_2) VALUES";
			//echo "gethering data..".PHP_EOL;
			if($res){
				foreach ($res as $key => $val) {
					$sql_trans_history_refs[] = "('".$val->transfer_id."',
						'".$val->br_code_in."',
						'".$val->transfer_in_date."',
						'".date('Y-m-d')."',
						'".$val->barcode."',
						'".$val->stock_id_2 ."'
					)";
					# code...
				}
			}

			$sql_trans_history = $sql_trans_history . implode(",",$sql_trans_history_refs);

			//echo $sql_trans_history;
		 $this->Auto_model->insert_transfer_history($sql_trans_history);
	}


	public function update_expired_pl($unthrow_refs,$branch,$main){

		 $this->Auto_model->update_expired_pl();

	}


	public function suggested_to_pl($unthrow_refs,$branch,$main){
		$branch =  $this->Auto_model->get_suggested_branch_to_pl();
		$branch_100 =  $this->Auto_model->get_db_133_in_transfers();
		$br_100_ = array();

		foreach ($branch_100 as $br_100) {
			$br_100_[$br_100->code] = $br_100->db_133;
		}
		$count = 0;


		$exclueds_to_pl =  $this->Auto_model->get_exclude_to_pl();
		$xplcode = array();
		foreach ($exclueds_to_pl as $xpl) {
			$xplcode[] = "'".$xpl->ProductCode."'";
		}
		$xpl =  implode(',',$xplcode);
		//echo $xpl;
		foreach ($branch as $br) {
			$count++;
			echo $count.' : '.$br->to_branch.'--'.$br->from_branch.PHP_EOL;
			$details =  $this->Auto_model->get_details_to_pl($br->to_branch,$br->from_branch,$xpl);

			if($details){

		
					$memo_ = 'AUTO SUGGESTED TO PL';
					$MovementCode  = 'STO';
					
					$header_sql = "INSERT INTO transfers.0_transfer_header (date_created,delivery_date,
					br_code_out,m_code_out,br_code_in,requested_by,memo_) 
					VALUES ('".date('Y-m-d')."', '".date('Y-m-d')."','".$br->from_branch."','".$MovementCode."','".$br->to_branch."','Administrator','".$memo_."')";


					$id_ = $this->Auto_model->insert_transfer_header($header_sql);
					$movement_id=$id_;

					//echo $movement_id.'****'; exit();
					$header_details =  "INSERT INTO transfers.0_transfer_details (transfer_id,stock_id,stock_id_2,description,barcode,uom,cost,qty_out,qty_in) VALUES ";

					$ids = array();
					$sql_arr_details = array();

					foreach ($details as $dt) {
							# code...
						$stock_id_1 =  $this->Auto_model->get_stock_id($br_100_[$br->from_branch],$dt->productcode);
						$stock_id_2 =  $this->Auto_model->get_stock_id($br_100_[$br->to_branch],$dt->productcode);
						$ids[] = $dt->id;
			/*			echo $stock_id_1->Barcode.'Barcode'.PHP_EOL;
						echo $stock_id_1->uom.'uom'.PHP_EOL;
						echo $stock_id_1->Description.'description'.PHP_EOL;
						echo $stock_id_1->CostOfSales.'CostOfSales'.PHP_EOL;
						echo $stock_id_1->ProductID.'######'.$stock_id_2->ProductID.PHP_EOL;*/
						if($stock_id_1 !='' && $stock_id_2 !=''){

							$sql_arr_details[] = "('".$movement_id."',
												'".$stock_id_1->ProductID."',
												'".$stock_id_2->ProductID."',
												'".$stock_id_1->Description."',
												'".$stock_id_1->Barcode."',
												'".$stock_id_1->uom."',
												'".$stock_id_1->CostOfSales."',
												'".$dt->qty_to_transfer."',
												'0'
												)";
						}
					}

					$updated_ids =  implode(",",$ids);
					$header_details = $header_details . implode(",",$sql_arr_details);
					/*echo $header_details;
					echo $updated_ids.'</br>';
					echo '</br>';*/

					 $ret = $this->Auto_model->insert_transfer_header($header_details);

				
					$sql = "UPDATE suggested_to_auto_pl SET pl_no ='".$movement_id."' where id in(".$updated_ids.") ";
					$this->Auto_model->upd_details_to_pl($sql);

				}
		}

	}

	public function processing_unthrow_refs($unthrow_refs,$branch,$main){

			if($main == 1){
				$branch = 'main';
			}

			$arr_refs = array();
			if($unthrow_refs){
				foreach ($unthrow_refs as $key => $value) {
						$arr_refs[] =  $value->order_no;
				}
			}else{
				echo "All P.O's has been Transfered";
			}


			$unthrow_refs =  implode("','", $arr_refs);
			//echo var_dump($unthrow_refs);
			$sql_arr_refs = array();
			$refs =  $this->Auto_model->get_refs($unthrow_refs,$main);
			$sql_refs = "INSERT IGNORE INTO refs VALUES";
			echo "gethering refs..".PHP_EOL;
			if($refs){
				foreach ($refs as $key => $val) {
					$sql_arr_refs[] = "('".$val->trans_id."',
						'".$val->trans_type."',
						'".$val->reference."',
						'".$val->user_id."',
						'0')";
					# code...
				}
			}

			$sql_refs = $sql_refs . implode(",",$sql_arr_refs);
			//echo $sql_refs.'-->'.PHP_EOL;
			//echo $refs.'<-->'.PHP_EOL;

			// die();
			echo "refs sql formated..".PHP_EOL;	

			$sql_arr_purch_orders = array();
			$purch_orders =  $this->Auto_model->get_purch_orders($unthrow_refs,$main);
			$sql_purch_orders =  "INSERT INTO purch_orders VALUES";
				$branch_code = $branch;
				echo "gethering purch_order_header..".PHP_EOL;
				if($purch_orders){
					foreach ($purch_orders as $key => $val) {
					# code...
					$supp_email = preg_replace("/[^a-zA-Z 0-9 . : ! () @]/", "", $val->supplier_email);
					$delivery_address = preg_replace("/[^a-zA-Z 0-9 . : ! () ]/", "",$val->delivery_address);
					$email = preg_replace("/[^a-zA-Z 0-9 . : ! () @]/", "",$val->email);
					$supplier_name = preg_replace("/[^a-zA-Z 0-9 . : ! () ]/", "",$val->supplier_name);

					$sql_arr_purch_orders[] = "('".$val->order_no."',
								'".$val->trans_type."',
								'".$val->trans_ref."',
								'".$val->trans_date."',
								'".$val->supplier_id."',
								'".$supplier_name."',
								'".$supp_email."',
								'".$val->br_code."',
								'".$delivery_address."',
								'".$val->delivery_date."',
								'".$val->net_total."',
								'".$val->sales_from."',
								'".$val->sales_to."',
								'".$val->selling_days."',
								'".$val->manual."',
								'".$val->ms_po_no."',
								".$val->status.",
								'".$email."',
								'".$val->w_cwo."',
								".$val->auto_generate.",
								'".$val->valid_date."',
								'".$val->valid_deleted."',
								'".$val->draft."',
								'".$val->within_period."',
								'".$val->lastdatemodified."'
								)";
					}
				}
				

			$sql_purch_orders = $sql_purch_orders . implode(",",$sql_arr_purch_orders);
			$sql_purch_orders = $sql_purch_orders." ON DUPLICATE KEY UPDATE  status = values(status)";

			//echo $sql_purch_orders.PHP_EOL;



			echo "purch_order_header sql formated..".PHP_EOL;
			//echo $unthrow_refs.'<<-$unthrow_refs';
			$sql_arr_purch_order_details = array();
			$purch_order_details =  $this->Auto_model->get_purch_order_details($unthrow_refs,$main);
			$sql_purch_order_details =  "INSERT IGNORE INTO purch_order_details VALUES";
			echo "gethering purch_order_details..".PHP_EOL;
			if($purch_order_details){
				
				foreach ($purch_order_details as $key => $val) {
					# code...
					$description = $this->Auto_model->escape_db($branch_code,$val->description);
					$sql_arr_purch_order_details[] = "('".$val->po_detail_item."',
						'".$val->order_no."',
						'".$val->trans_type."',
						'".$val->stock_id."',
						'".$val->barcode."',
						".$description.",
						'".$val->unit_id."',
						'".$val->unit_price."',
						'".$val->discounts."',
						'".$val->sgstd_qty."',
						'".$val->ord_qty."',
						'".$val->rcv_qty."',
						'".$val->past."',
						'".$val->current."',
						'".$val->selling_days."')";
				}			
			}

			$sql_purch_order_details = $sql_purch_order_details . implode(",",$sql_arr_purch_order_details);
			echo "purch_order_details sql formated..".PHP_EOL;

		//	echo $sql_purch_order_details.PHP_EOL; die();
			//echo $sql_purch_orders;

			if($unthrow_refs){
				$insert  = $this->Auto_model->insert($sql_refs,$sql_purch_orders,$sql_purch_order_details,$branch_code,$main);
				echo '###'.$insert.'## and Already inserted#'.PHP_EOL;
				if($insert =='Rollback'){
					return true;
				}else{
				 	$this->Auto_model->update_throw($unthrow_refs,$main);
					return false;
				}
			}else{
				return false;
			}
				

	}

	

	public function transfer_purch($type = null,$branch = array()){
		switch ($type) {
			case '0':
				# code...
				$main = 1;
				$data = $this->Auto_model->get_all_branches($branch);

				foreach($data as $br_value)
					{
						echo $br_value->code.PHP_EOL;
						$unthrow_refs = $this->Auto_model->get_unthrow_refs('main',$br_value->code);
						 echo "# to throw : ".count($unthrow_refs).PHP_EOL;
						$this->processing_unthrow_refs($unthrow_refs,'',$main);	
						
					}

				break;
			
			case '1':
				# code...
				//echo var_dump($branch);
				$data = $this->Auto_model->get_all_branches($branch);
				// echo var_dump($data);
				//die();
				$main = 0;
					foreach($data as $br_value)
					{
						 echo $br_value->code.PHP_EOL;
						 $arr_refs =  array();
						 $unthrow_refs = $this->Auto_model->get_unthrow_refs($br_value->code);
						 echo "# to throw : ".count($unthrow_refs).PHP_EOL;
						 $data = $this->processing_unthrow_refs($unthrow_refs,$br_value->code,$main);
						 if(!$data){
						 	continue;
						 	echo $br_value->code.'Rollback';
						 }
					}
				break;

		}


	}

	public function ping($host,$port=80,$timeout=4)
    {

            $fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
            
            if ( ! $fsock )
            {
                     error_reporting(0);
                    return FALSE;
            }
            else
            {

                    return TRUE;
            }

    }

	public function get_type_to_transfer($batch = 0 ,$branch = array()){

		/*echo $batch.'<-batch';
		echo $branch.'<-branch';
		die();*/
		echo "Tranfering data..".PHP_EOL;
		# 0 - main;
		# 1 - per branch;
		if($batch == 0){

			echo "Tranfering main!".PHP_EOL;
				$this->transfer_purch(0,$branch);
			echo "Already Transfered".PHP_EOL;

		}else{
			
			echo "Tranfering Per Branch".PHP_EOL;
			$data = $this->Auto_model->get_all_branches($branch);
			foreach($data as $br_value)
				{
					$branch_code = $br_value->code;
					$ping_results = $this->ping($br_value->ip);
          			if($ping_results){
						$this->transfer_purch(1,$branch);
          			}else{
          				echo $branch_code.' - (disconnected)'.PHP_EOL;
          			}
          		}

			echo "Already Transfered".PHP_EOL;
		}



	}


	public function get_type_to_transfer_modeified_data_even(){
		$datetoday = date('Y-m-d');
		$past_date = date('Y-m-d',strtotime('-2 days',strtotime($datetoday)));	
		//$past_date = date('Y-m-d');	

		echo "Tranfering data..".PHP_EOL;
		# 0 - main;
		# 1 - per branch;
		echo "Tranfering modeified_data main!".PHP_EOL;

			$this->transfer_purch_modeified(0,$past_date);
		echo "Already Transfered".PHP_EOL;


		echo "Tranfering modeified_data Per Branch".PHP_EOL;
			$num = 'even';
			$this->transfer_purch_modeified(1,$past_date,$num);
		echo "Already Transfered".PHP_EOL;


	}

	public function get_type_to_transfer_modeified_data_odd(){
		$datetoday = date('Y-m-d');
		$past_date = date('Y-m-d',strtotime('-2 days',strtotime($datetoday)));	
		//$past_date = date('Y-m-d');	

		echo "Tranfering data..".PHP_EOL;
		# 0 - main;
		# 1 - per branch;
		echo "Tranfering modeified_data main!".PHP_EOL;

			$this->transfer_purch_modeified(0,$past_date);
		echo "Already Transfered".PHP_EOL;


		echo "Tranfering modeified_data Per Branch".PHP_EOL;
			$num = 'odd';
			$this->transfer_purch_modeified(1,$past_date,$num);
		echo "Already Transfered".PHP_EOL;


	}

	public function update_posted_transit_(){
		$unposted = $this->Auto_model->get_unposted_transit();
		$arr_list = array();
		foreach ($unposted as $upd) {
			$arr_list[] = "'".$upd->po_no."'";
		}

		 $imploded_val = implode(",",$arr_list);
		 
		 $posted =  $this->Auto_model->get_posted_transit($imploded_val);

		 foreach ($posted as $pp) {
			$posted_arr_list[] = "'".$pp->PurchaseOrderNo."'";
		}

		 $imploded_posted_val = implode(",",$posted_arr_list);

		 echo var_dump($imploded_posted_val);
	}

	


	public function transfer_purch_modeified($type = null,$past_date,$num){


		switch ($type) {
			case '0':
				# code...
				$main = 1;
				$modifieddata = $this->Auto_model->processing_modified_data('',$past_date,$main);
				$this->processing_modified_data_list($modifieddata,'',$past_date,$main);

				break;
			
			case '1':
				# code...
				$data = $this->Auto_model->get_all_branches('',$num);
				$main = 0;
				foreach($data as $br_value)
				{
					$branch_code = $br_value->code;
					$ping_results = $this->ping($br_value->ip);
          			if($ping_results){
						$modifieddata = $this->Auto_model->processing_modified_data($branch_code,$past_date,$main);
						$this->processing_modified_data_list($modifieddata,$branch_code,$past_date,$main);
          			}else{
          				echo $branch_code.' - (disconnected) : IP:'.$br_value->ip.PHP_EOL;
          			}
				}
					
				break;

		}

	}

	public function update_modified($branch_code){
		$past_date = date('Y-m-d',strtotime('-2 days',strtotime($datetoday)));	
		$main = 0;
		$modifieddata = $this->Auto_model->processing_modified_data($branch_code,$past_date,$main);
		$this->processing_modified_data_list($modifieddata,$branch_code,$past_date,$main);

	}

	public function processing_modified_data_list($modifieddata,$branch_code,$past_date,$main){

		if($modifieddata){

			echo $branch_code.'<<'.count($modifieddata).PHP_EOL;

			foreach ($modifieddata as $key => $val) {

				$data = array(
				        'status' => $val->status,
				        'lastdatemodified' => $val->lastdatemodified,
						);

				//echo var_dump($data);

				$trans_type = $val->trans_type;
				$order_no = $val->order_no;

				$res = $this->Auto_model->update_modified_purch($data,$trans_type,$order_no,$branch_code,$main);

				//echo $val->order_no.$res.PHP_EOL;

			}
			echo 'Updated!'.PHP_EOL;

		}

	}
	public function get_new_vendor_trans_to_all(){
		$bra = array(); //'srsant2'
		$branch = $this->Auto_model->get_all_branches($bra);

		$vendor = $this->Auto_model->get_vendor_modified($bra);
		
		
		foreach ($branch as $key => $val) {

			$po_db =  $val->srs_po_db;
			$sql_insert = "INSERT INTO $po_db.vendor VALUES";
			$vres = array();
			foreach ($vendor as $key => $ven) {
				$vres[] = "(
					'".$ven->vendorcode."',
					'".$ven->description."',
					'".$ven->address."',
					'".$ven->city."',
					'".$ven->zipcode."',
					'".$ven->country."',
					'".$ven->fax."',
					'".$ven->email."',
					'".$ven->phone."',
					'".$ven->contactperson."',
					".$ven->termid.",
					".$ven->daystodeliver.",
					'".$ven->tradediscount."',
					'".$ven->cashdiscount."',
					".$ven->terms.",
					".$ven->IncludeLineDiscounts.",
					'".$ven->discountcode1."',
					'".$ven->discountcode2."',
					'".$ven->discountcode3."',
					".$ven->discount1.",
					".$ven->discount2.",
					".$ven->discount3.",
					".$ven->daystosum.",
					".$ven->reordermultiplier.",
					'".$ven->remarks."',
					".$ven->SHAREWITHBRANCH.",
					".$ven->Consignor.",
					'".$ven->LASTDATEMODIFIED."',
					'".$ven->TIN."'
					)"
					;
		
			}
			$sql_insert = $sql_insert . implode(",",$vres);
			$sql_insert = $sql_insert." ON DUPLICATE KEY UPDATE  description = values(description) , address = values(address), email = values(email) ";
			$res = $this->Auto_model->global_query_main($sql_insert);
			if($res){
				echo 'done: '.$po_db.PHP_EOL; 
			}

		}
		
		/* foreach ($data as $key => $val) {

			$po_db =  $val->srs_po_db;
			echo $po_db.PHP_EOL;
			$sql = "INSERT IGNORE INTO $po_db.vendor
			select * from srs_po_nova.vendor where vendorcode IN('JENCHI001')";
			$this->Auto_model->global_query_main($sql);
		} */
	}
	public function realigning_excludes(){
		$bra = array(); //'srsant2'
		$data = $this->Auto_model->get_all_branches($bra);

		foreach ($data as $key => $val) {

			$po_db =  $val->srs_po_db;
			$db_100 =  $val->db_100;
			$excludes = $this->Auto_model->get_excludes($po_db);
			$exclude_ls = array();
			echo $po_db.PHP_EOL;
			foreach ($excludes as $ex) {
				$exclude_ls[] =  $ex->VendorProductCode;
			}

			 $excludes =  implode("','", $exclude_ls);

			 if($db_100){
				$defa_exclude = $this->Auto_model->get_default_excludes($db_100,$excludes);
				$sql_del =  "DELETE FROM $po_db.exclude_items";	
				$sql =  "INSERT INTO $po_db.exclude_items (ProductID,VendorProductCode,VendorCode) VALUES";	
				$excludes_details = array();

				foreach ($defa_exclude as $exins) {
					$excludes_details[] = "(
								'".$exins->productid."',
								'".$exins->vendorproductcode."',
								'".$exins->vendorcode."')";


				}

				$sql = $sql . implode(",",$excludes_details);
				$sql = $sql." ON DUPLICATE KEY UPDATE productid = values(productid),vendorproductcode = values(vendorproductcode), vendorcode = values(vendorcode) ";

			$this->Auto_model->global_query_main($sql_del);
			$excludes_res = $this->Auto_model->global_query_main($sql);
			$status = $this->Auto_model->check_stat_main();
			if(!$branch_res && $status == "Rollback"){
					continue;
			}

			echo "Branch: ".$db_100.':'.$status.PHP_EOL;  

			}
		}


	}

	## supplier freq 

	public function gathering_supplier_freq(){
		$bra = array(); //'srsant2'
		$bra = array(); //'srsant2'
		$data = $this->Auto_model->get_all_branches($bra);
		foreach ($data as $key => $val) {
			# code...
			$ping_results = $this->ping($val->ip);
			if(!$ping_results){
				echo $branch_code.' - (disconnected)'.PHP_EOL;
				continue;
			}

			$po_db =  $val->srs_po_db;
			$branch_code = $val->code;
			echo PHP_EOL;
			echo PHP_EOL;
			echo PHP_EOL;
			echo $branch_code.PHP_EOL;

 			$get_branch =  $this->Auto_model->get_branch();
			echo 'branches to be updated: '.count($get_branch).PHP_EOL;
			$sql_branch =  "INSERT IGNORE INTO branches VALUES";
			$sql_branch_details = array();
			echo "gethering branches..".PHP_EOL;
			if($get_branch){
				foreach ($get_branch as $key => $br_val) {
					# code...
					$sql_branch_details[] = "(

								'".$br_val->id."',
								'".$br_val->code."',
								'".$br_val->name."',
								'".$br_val->database."',
								'".$br_val->ci_ms_database."',
								'".$br_val->tin."',
								'".$br_val->address."',
								'".$br_val->tel_no."',
								'".$br_val->mobile."',
								'".$br_val->ip."',
								'".$br_val->ms_ip."',
								'".$br_val->reg_date."',
								'".$br_val->inactive."',
								'".$br_val->copy_po."',
								'".$br_val->config_db_key."',
								'".$br_val->veg_name."',
								'".$br_val->srs_po_db."',
								'".$br_val->throw."',
								'".$br_val->lastdatemodified."')";
				}			
			$sql_branch = $sql_branch . implode(",",$sql_branch_details);
			$branch_res = $this->Auto_model->global_insert($branch_code,$sql_branch);
			$status = $this->Auto_model->check_stat($branch_code);
			if(!$branch_res && $status == "Rollback"){
					continue;
			}
			echo $branch_res.PHP_EOL; 
			echo "Branches: ".$status.PHP_EOL;  
			}


		

			$get_supp_freq_refs =  $this->Auto_model->get_supp_freq_refs($branch_code,'id','supplier_frequency');

			$supplier_f = array();
			if($get_supp_freq_refs){
				foreach ($get_supp_freq_refs as $key => $value) {
						$supplier_f[] =  $value->id;
				}
			}else{
				echo "All Supp Freq.. has been Transfered">PHP_EOL;
			}

			 $unthrow_freq =  implode("','", $supplier_f);

			 $sql_supplier_frequency_branch  = "DELETE FROM supplier_frequency";
			  $this->Auto_model->global_delete($branch_code,$sql_supplier_frequency_branch);

			$get_supp_freq =  $this->Auto_model->get_supp_freq($unthrow_freq,$branch_code);

			echo 'frequency to be updated: '.count($get_supp_freq).PHP_EOL;

			$sql_supplier_frequency =  "INSERT INTO supplier_frequency VALUES";	
			$sql_supplier_frequency_details = array();
			echo "gethering supplier_frequency..".PHP_EOL;
			if($get_supp_freq){
				foreach ($get_supp_freq as $key => $supp_freq) {
					# code...

					$valid_until = 0;
					if($supp_freq->valid_until){
						$valid_until = $supp_freq->valid_until;
					}
					
					$sql_supplier_frequency_details[] = "(
						'".$supp_freq->id."',
						'".$supp_freq->frequency."',
						'".$supp_freq->date_created."',
						'".$supp_freq->date_edited."',
						'".$supp_freq->branch."',
						'".$supp_freq->supplier."',
						'".$supp_freq->days."',
						'".$supp_freq->selling."',
						'".$supp_freq->user_id."',
						'".$valid_until."',
						'".$supp_freq->delivery_date."',
						'".$supp_freq->verified_by."',
						'".$supp_freq->auto_po."',
						'".$supp_freq->status."',
						'".$supp_freq->resume."',
						'".$supp_freq->within_period."',
						'".$supp_freq->minimum."',
						'".$supp_freq->maximum."',
						'".$supp_freq->min_pc."',
						'".$supp_freq->throw."')";
				}

			$sql_supplier_frequency = $sql_supplier_frequency . implode(",",$sql_supplier_frequency_details);
			$sql_supplier_frequency = $sql_supplier_frequency." ON DUPLICATE KEY UPDATE date_created = values(date_created),delivery_date = values(delivery_date), date_edited = values(date_edited) ,frequency = values(frequency) ,days = values(days),selling = values(selling),auto_po = values(auto_po),status = values(status),resume  = values(resume) ,min_pc = values(min_pc),user_id = values(user_id) ";


			}



			$get_supp_freq_det =  $this->Auto_model->get_supp_freq_det($unthrow_freq,$branch_code);
			echo count($get_supp_freq_det).'counrdetails'.PHP_EOL;;
			echo 'frequency details to be updated: '.count($get_supp_freq_det).PHP_EOL;

			$supplier_frequency_items =  "INSERT INTO supplier_frequency_items VALUES";	
			$sql_supplier_frequency_items_details = array();
			echo "gethering supplier_frequency_items..".PHP_EOL;
			if($get_supp_freq_det){
				foreach ($get_supp_freq_det as $key => $supp_freq_det) {
					# code...
					$sql_supplier_frequency_items_details[] = "(
						'".$supp_freq_det->id."',
						'".$supp_freq_det->supplier_frequency_id."',
						'".$supp_freq_det->product_code."',
						'".$supp_freq_det->selling_days."')";
				}				
			$supplier_frequency_items = $supplier_frequency_items . implode(",",$sql_supplier_frequency_items_details);
			$supplier_frequency_items = $supplier_frequency_items . " ON DUPLICATE KEY UPDATE selling_days = values(selling_days)";
			}

			echo $supplier_frequency_items;
			$delete_freq = "DELETE  FROM  supplier_frequency_items";
			if($get_supp_freq){
				$sql_delete_supplier_frequency = $this->Auto_model->global_insert($branch_code,$delete_freq);
				$sql_supplier_frequency = $this->Auto_model->global_insert($branch_code,$sql_supplier_frequency);
				if($get_supp_freq_det){
					$supplier_frequency_items = $this->Auto_model->global_insert($branch_code,$supplier_frequency_items);
				}
				$status = $this->Auto_model->check_stat($branch_code);
				echo "supplier_frequency and supplier_frequency_items :".$status.PHP_EOL;
				$st = $this->Auto_model->global_update_throw($unthrow_freq,'supplier_frequency', 'id');
				echo $st.'throw updated!'.PHP_EOL;
				if(!$sql_supplier_frequency &&  $status =="Rollback"){
					continue;
				}
			}


			

			$get_supp_freq_refs =  $this->Auto_model->get_supp_freq_refs('','id','supplier_frequency_verificator');
			$supplier_fv = array();
			if($get_supp_freq_refs){
				foreach ($get_supp_freq_refs as $key => $value) {
						$supplier_fv[] =  $value->id;
				}
			}else{

				echo "All Supp Freq.. has been Transfered".PHP_EOL;
			}

			 $unthrow_freq =  implode("','", $supplier_fv);

			$supplier_frequency_verificator_det =  $this->Auto_model->global_gathering_refs($unthrow_freq,'supplier_frequency_verificator','id');
			echo 'frequency verificator to be updated: '.count($supplier_frequency_verificator_det).PHP_EOL;

			$sql_supplier_frequency_verificator =  "INSERT IGNORE INTO supplier_frequency_verificator VALUES";	
			$sql_supplier_frequency_verificator_details = array();
			echo "gethering supplier_frequency_verificator..".PHP_EOL;
			if($supplier_frequency_verificator_det){
				foreach ($supplier_frequency_verificator_det as $key => $verificator_det) {
					# code...supplier_frequency_verificator_det
					$sql_supplier_frequency_verificator_details[] = "(
						'".$verificator_det->id."',
						'".$verificator_det->user_id."',
						'".$verificator_det->throw."')";
				}				
			$sql_supplier_frequency_verificator = $sql_supplier_frequency_verificator . implode(",",$sql_supplier_frequency_verificator_details);
			$verificator = $this->Auto_model->global_insert($branch_code,$sql_supplier_frequency_verificator);
			$st = $this->Auto_model->global_update_throw($unthrow_freq,'supplier_frequency_verificator', 'id');
			$status = $this->Auto_model->check_stat($branch_code);
			if(!$verificator && $st == "Rollback"){
					continue;
			}
			echo "Supplier_frequency_verificator: ".$status.PHP_EOL; 
			echo $st.'throw updated!'.PHP_EOL;
			}

			
			##truckload
			$get_supp_freq_refs =  $this->Auto_model->get_supp_freq_refs('','id','truck_load');
			$truck_l = array();
			if($get_supp_freq_refs){
				foreach ($get_supp_freq_refs as $key => $value) {
						$truck_l[] =  $value->id;
				}
			}else{
				echo "All Supp Freq.. has been Transfered";
			}

			 $unthrow_freq =  implode("','", $truck_l);

			$truck_load_det =  $this->Auto_model->global_gathering_refs($unthrow_freq,'truck_load','id');


			$sql_truck_load =  "INSERT INTO truck_load VALUES";	
			$sql_truck_load_details = array();
			echo "gethering supplier_frequency_verificator..".PHP_EOL;
			if($truck_load_det){
				foreach ($truck_load_det as $key => $truc_det) {
					# code...supplier_frequency_verificator_det
					$sql_truck_load_details[] = "(
						'".$truc_det->id."',
						'".$truc_det->uom."',
						'".$truc_det->qty."',
						'".$truc_det->supplier_id."',
						'".$truc_det->throw."',
						'".$truc_det->lastdatemodified."')";
				}				
			$sql_truck_load = $sql_truck_load . implode(",",$sql_truck_load_details);
			$sql_truck_load = $sql_truck_load ." ON DUPLICATE KEY UPDATE  uom = values(uom), qty = values(qty) ";


			$tload = $this->Auto_model->global_insert($branch_code,$sql_truck_load);
			$status = $this->Auto_model->check_stat($branch_code);
			echo "Truck load: ".$status.PHP_EOL;
			$st = $this->Auto_model->global_update_throw($unthrow_freq,'truck_load', 'id');
			if(!$tload && $status =="Rollback"){
				continue;
			}
			echo $st.'throw updated!'.PHP_EOL;
			}
			##truckload 


			//DAN
			##user_vendor
			 $unthrow_freq='';

			$get_user_vendor_det =  $this->Auto_model->global_gathering_refs($unthrow_freq,'user_vendor','id');

			$sql_user_vendor_branch  = "DELETE FROM user_vendor";
			$user_ven = $this->Auto_model->global_delete($branch_code,$sql_user_vendor_branch);

			$sql_user_vendor =  "INSERT INTO user_vendor VALUES";	
			$sql_user_vendor_details = array();
			echo "gethering user_vendor..".PHP_EOL;
			if($get_user_vendor_det){
				foreach ($get_user_vendor_det as $key => $user_v) {
					# code...supplier_frequency_verificator_det
					$sql_user_vendor_details[] = "(
						'".$user_v->id."',
						'".$user_v->vendor."',
						'".$user_v->user_id."',
						'".$user_v->throw."',
						'".$user_v->lastdatemodified."'
						)";
				}		

			$sql_user_vendor = $sql_user_vendor . implode(",",$sql_user_vendor_details);
			$sql_user_vendor = $sql_user_vendor . " ON DUPLICATE KEY UPDATE  user_id = VALUES(user_id), vendor = VALUES(vendor) ";

			$user_ven = $this->Auto_model->global_insert($branch_code,$sql_user_vendor);
			$status = $this->Auto_model->check_stat($branch_code);
			echo "user vendor : ".$status.PHP_EOL;
			$st = $this->Auto_model->global_update_throw($unthrow_freq,'user_vendor', 'id');
			echo $st.'throw updated!'.PHP_EOL;	

				if(!$user_ven && $status =="Rollback"){
					continue;
				}
			}

			##user_vendor

			//DAN
			##users
			/*$get_user =  $this->Auto_model->get_supp_freq_refs('','id','users');
			$users_ids = array();
			if($get_user){
				foreach ($get_user as $key => $value) {
						$users_ids[] =  $value->id;
				}
			}else{
				echo "All Supp Freq.. has been Transfered";
			}

			 $unthrow_freq =  implode("','", $users_ids);*/

			$unthrow_freq ='';
			$get_user_det =  $this->Auto_model->global_gathering_refs($unthrow_freq,'users','id');

			$sql_user_branch  = "DELETE FROM users";
			$user_ven = $this->Auto_model->global_delete($branch_code,$sql_user_branch);

			$sql_user =  "INSERT IGNORE INTO users VALUES";	
			$sql_user_details = array();
			echo "gethering user..".PHP_EOL;
			if($get_user_det){
				foreach ($get_user_det as $key => $user_) {
					# code...supplier_frequency_verificator_det
					$sql_user_details[] = "(
						'".$user_->id."',
						'".$user_->emp_code."',
						'".$user_->role."',
						'".$user_->user."',
						'".$user_->password."',
						'".$user_->fname."',
						'".$user_->mname."',
						'".$user_->lname."',
						'".$user_->gender."',
						'".$user_->suffix."',
						'".$user_->phone."',
						'".$user_->tel_no."',
						'".$user_->email."',
						'".$user_->address."',
						'".$user_->birthday."',
						'".$user_->img."',
						'".$user_->last_log."',
						'".$user_->last_activity."',
						'".$user_->theme."',
						'".$user_->user_lang."',
						'".$user_->online."',
						'".$user_->date_added."',
						'".$user_->inactive."',
						'".$user_->desc."',
						'".$user_->sign."',
						'".$user_->aria_user_id."',
						'".$user_->throw."',
						'".$user_->lastdatemodified."')";
				}		
						
			$sql_user = $sql_user . implode(",",$sql_user_details);

			$user = $this->Auto_model->global_insert($branch_code,$sql_user);
			$status = $this->Auto_model->check_stat($branch_code);
			echo "user vendor : ".$status.PHP_EOL;	
			$st = $this->Auto_model->global_update_throw($unthrow_freq,'users', 'id');
			echo $st.'throw updated!'.PHP_EOL;	

				if(!$user && $status == "Rollback"){
					continue;
				}
			}

			##users
	
		}


	}
	

	public function gathering_excludes(){

		$data = $this->Auto_model->get_all_branches();

		foreach ($data as $key => $val) {
			# code...
			$po_db =  $val->srs_po_db;
			$branch_code =  $val->code;


			# exclude items
			$get_exclude_stockid =  $this->Auto_model->get_supp_freq_refs('','id',$po_db.'.exclude_items');
			$exclude_ids = array();
			if($get_exclude_stockid){
				foreach ($get_exclude_stockid as $key => $value) {
					//echo $value->id;
						$exclude_ids[] =  $value->id;
				}
			}else{
				echo "All exclude_items.. has been Transfered";
			}

			 $unthrow_freq =  implode("','", $exclude_ids);
			// echo $unthrow_freq;
			$get_exclude_det =  $this->Auto_model->global_gathering_refs($unthrow_freq,$po_db.'.exclude_items','id');
			$sql_exclude =  "INSERT IGNORE INTO exclude_items (id,ProductID,VendorProductCode,VendorCode) VALUES";		
			$sql_exclude_details = array();
			if($get_exclude_det){
				foreach ($get_exclude_det as $key => $exclude) {
					# code...supplier_frequency_verificator_det
					$sql_exclude_details[] = "(
							'".$exclude->id."',
							'".$exclude->ProductID."',
							'".$exclude->VendorProductCode."',
							'".$exclude->VendorCode."'
						)";
				}				
			}

			$sql_exclude = $sql_exclude . implode(",",$sql_exclude_details);
			
			
			
			//echo $sql_exclude;
			$test = $this->Auto_model->global_insert($branch_code,$sql_exclude);
			$status = $this->Auto_model->check_stat($branch_code);
			echo "exclude_items : ".$status.PHP_EOL;	
			
			#exclude items 
			//die();

/*			# exclude wholesaler
			$get_exclude_stockid_ws =  $this->Auto_model->get_supp_freq_refs('','id',$po_db.'.excluded_whoiesale_customer');
			$excluded_whoiesale_ids = array();
			if($get_exclude_stockid_ws){
				foreach ($get_exclude_stockid_ws as $key => $value) {
						$excluded_whoiesale_ids[] =  $value->id;
				}
			}else{
				echo "All excluded_whoiesale_customer.. has been Transfered";
			}

			$unthrow_freq =  implode("','", $excluded_whoiesale_ids);

			$get_exclude_det_cus =  $this->Auto_model->global_gathering_refs($unthrow_freq,$po_db.'.excluded_whoiesale_customer','id');
			echo $get_exclude_det_cus.'?';
			$sql_exclude_ws =  "INSERT IGNORE INTO excluded_whoiesale_customer VALUES";	
			$sql_exclude_ws_details = array();
			echo "gethering user..".PHP_EOL;
			if($get_exclude_det_cus){
				foreach ($get_exclude_det_cus as $key => $ws) {
					# code...supplier_frequency_verificator_det
					$sql_exclude_ws_details[] = "(
								'". $ws->id."',
								'".preg_replace("/[^a-zA-Z 0-9 . : ! () @ ]/", "", $ws->wholesale_customer_name)."',
								'".preg_replace("/[^a-zA-Z 0-9 . : ! () @ ]/", "", $ws->customer_description)."',
								'".$ws->datetime."',
								'".$ws->throw."')";
				}				
			}

			$sql_exclude_ws = $sql_exclude_ws . implode(",",$sql_exclude_ws_details);
			//echo $sql_exclude_ws;
			if($sql_exclude_ws){
				$test = $this->Auto_model->global_insert($branch_code,$sql_exclude_ws);
			}
			//echo $test.'test'.PHP_EOL;
			$status = $this->Auto_model->check_stat($branch_code);
			echo "excluded_whoiesale_customer : ".$status.PHP_EOL;	
			$st = $this->Auto_model->global_update_throw($unthrow_freq,$po_db.'.excluded_whoiesale_customer', 'id');
			echo $st.'throw updated!'.PHP_EOL;
			#exclude wholesaler
*/

		}

	}


}

