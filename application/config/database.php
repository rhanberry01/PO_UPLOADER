<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '192.168.0.56',
	'username' => 'root',
	'password' => '',
	'database' => 'srs',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => 'production',
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


 
$db['main']['hostname'] = '192.168.0.91'; 
$db['main']['username'] = 'root';
$db['main']['password'] = 'srsnova';
$db['main']['database'] = 'srs';
$db['main']['dbdriver'] = 'mysqli';
$db['main']['dbprefix'] = '';
$db['main']['pconnect'] = 'production';
$db['main']['db_debug'] = FALSE;
$db['main']['cache_on'] = FALSE;
$db['main']['cachedir'] = '';
$db['main']['char_set'] = 'utf8';
$db['main']['dbcollat'] = 'utf8_general_ci';
$db['main']['swap_pre'] = '';
$db['main']['autoinit'] = FALSE;
$db['main']['stricton'] = FALSE;

#NOVA
$db['srsn']['hostname'] = '192.168.0.91'; 
$db['srsn']['username'] = 'root';
$db['srsn']['password'] = 'srsnova';
$db['srsn']['database'] = 'srs';
$db['srsn']['dbdriver'] = 'mysqli';
$db['srsn']['dbprefix'] = '';
$db['srsn']['pconnect'] = 'production';
$db['srsn']['db_debug'] = FALSE;
$db['srsn']['cache_on'] = FALSE;
$db['srsn']['cachedir'] = '';
$db['srsn']['char_set'] = 'utf8';
$db['srsn']['dbcollat'] = 'utf8_general_ci';
$db['srsn']['swap_pre'] = '';
$db['srsn']['autoinit'] = FALSE;
$db['srsn']['stricton'] = FALSE;



$db['srsn_srs']['hostname'] = '192.168.0.179'; 
$db['srsn_srs']['username'] = 'root';
$db['srsn_srs']['password'] = 'srsnova';
$db['srsn_srs']['database'] = 'srs';
$db['srsn_srs']['dbdriver'] = 'mysqli';
$db['srsn_srs']['dbprefix'] = '';
$db['srsn_srs']['pconnect'] = 'production';
$db['srsn_srs']['db_debug'] = FALSE;
$db['srsn_srs']['cache_on'] = FALSE;
$db['srsn_srs']['cachedir'] = '';
$db['srsn_srs']['char_set'] = 'utf8';
$db['srsn_srs']['dbcollat'] = 'utf8_general_ci';
$db['srsn_srs']['swap_pre'] = '';
$db['srsn_srs']['autoinit'] = FALSE;
$db['srsn_srs']['stricton'] = FALSE;




$db['srsn_migration']['hostname'] = '192.168.0.179'; 
$db['srsn_migration']['username'] = 'root';
$db['srsn_migration']['password'] = 'srsnova';
$db['srsn_migration']['database'] = 'migration';
$db['srsn_migration']['dbdriver'] = 'mysqli';
$db['srsn_migration']['dbprefix'] = '';
$db['srsn_migration']['pconnect'] = 'production';
$db['srsn_migration']['db_debug'] = FALSE;
$db['srsn_migration']['cache_on'] = FALSE;
$db['srsn_migration']['cachedir'] = '';
$db['srsn_migration']['char_set'] = 'utf8';
$db['srsn_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsn_migration']['swap_pre'] = '';
$db['srsn_migration']['autoinit'] = FALSE;
$db['srsn_migration']['stricton'] = FALSE;



#TONDO
$db['srst']['hostname'] = '192.168.5.21'; 
$db['srst']['username'] = 'root';
$db['srst']['password'] = 'srsnova';
$db['srst']['database'] = 'srs';
$db['srst']['dbdriver'] = 'mysqli';
$db['srst']['dbprefix'] = '';
$db['srst']['pconnect'] = 'production';
$db['srst']['db_debug'] = false;
$db['srst']['cache_on'] = FALSE;
$db['srst']['cachedir'] = '';
$db['srst']['char_set'] = 'utf8';
$db['srst']['dbcollat'] = 'utf8_general_ci';
$db['srst']['swap_pre'] = '';
$db['srst']['autoinit'] = FALSE;
$db['srst']['stricton'] = FALSE;


$db['srst_migration']['hostname'] = '192.168.5.21'; 
$db['srst_migration']['username'] = 'root';
$db['srst_migration']['password'] = 'srsnova';
$db['srst_migration']['database'] = 'migration';
$db['srst_migration']['dbdriver'] = 'mysqli';
$db['srst_migration']['dbprefix'] = '';
$db['srst_migration']['pconnect'] = 'production';
$db['srst_migration']['db_debug'] = false;
$db['srst_migration']['cache_on'] = FALSE;
$db['srst_migration']['cachedir'] = '';
$db['srst_migration']['char_set'] = 'utf8';
$db['srst_migration']['dbcollat'] = 'utf8_general_ci';
$db['srst_migration']['swap_pre'] = '';
$db['srst_migration']['autoinit'] = FALSE;
$db['srst_migration']['stricton'] = FALSE;


	
#Montalban
$db['srsmon']['hostname'] = '192.168.23.100'; 
$db['srsmon']['username'] = 'root';
$db['srsmon']['password'] = 'srsnova';
$db['srsmon']['database'] = 'srs';
$db['srsmon']['dbdriver'] = 'mysqli';
$db['srsmon']['dbprefix'] = '';
$db['srsmon']['pconnect'] = 'production';
$db['srsmon']['db_debug'] = false;
$db['srsmon']['cache_on'] = FALSE;
$db['srsmon']['cachedir'] = '';
$db['srsmon']['char_set'] = 'utf8';
$db['srsmon']['dbcollat'] = 'utf8_general_ci';
$db['srsmon']['swap_pre'] = '';
$db['srsmon']['autoinit'] = FALSE;
$db['srsmon']['stricton'] = FALSE;


$db['srsmon_migration']['hostname'] ='192.168.23.100';
$db['srsmon_migration']['username'] = 'root';
$db['srsmon_migration']['password'] = 'srsnova';
$db['srsmon_migration']['database'] = 'migration';
$db['srsmon_migration']['dbdriver'] = 'mysqli';
$db['srsmon_migration']['dbprefix'] = '';
$db['srsmon_migration']['pconnect'] = 'production';
$db['srsmon_migration']['db_debug'] = false;
$db['srsmon_migration']['cache_on'] = FALSE;
$db['srsmon_migration']['cachedir'] = '';
$db['srsmon_migration']['char_set'] = 'utf8';
$db['srsmon_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsmon_migration']['swap_pre'] = '';
$db['srsmon_migration']['autoinit'] = FALSE;
$db['srsmon_migration']['stricton'] = FALSE;


#IMUS
$db['sri']['hostname'] = '192.168.108.100'; 
$db['sri']['username'] = 'root';
$db['sri']['password'] = 'srsnova';
$db['sri']['database'] = 'srs';
$db['sri']['dbdriver'] = 'mysqli';
$db['sri']['dbprefix'] = '';
$db['sri']['pconnect'] = 'production';
$db['sri']['db_debug'] = false;
$db['sri']['cache_on'] = FALSE;
$db['sri']['cachedir'] = '';
$db['sri']['char_set'] = 'utf8';
$db['sri']['dbcollat'] = 'utf8_general_ci';
$db['sri']['swap_pre'] = '';
$db['sri']['autoinit'] = FALSE;
$db['sri']['stricton'] = FALSE;


$db['sri_migration']['hostname'] = '192.168.108.100'; 
$db['sri_migration']['username'] = 'root';
$db['sri_migration']['password'] = 'srsnova';
$db['sri_migration']['database'] = 'migration';
$db['sri_migration']['dbdriver'] = 'mysqli';
$db['sri_migration']['dbprefix'] = '';
$db['sri_migration']['pconnect'] = 'production';
$db['sri_migration']['db_debug'] = false;
$db['sri_migration']['cache_on'] = FALSE;
$db['sri_migration']['cachedir'] = '';
$db['sri_migration']['char_set'] = 'utf8';
$db['sri_migration']['dbcollat'] = 'utf8_general_ci';
$db['sri_migration']['swap_pre'] = '';
$db['sri_migration']['autoinit'] = FALSE;
$db['sri_migration']['stricton'] = FALSE;



#NAVOTAS
$db['srsnav']['hostname'] = '192.168.107.100'; 
$db['srsnav']['username'] = 'root';
$db['srsnav']['password'] = 'srsnova';
$db['srsnav']['database'] = 'srs';
$db['srsnav']['dbdriver'] = 'mysqli';
$db['srsnav']['dbprefix'] = '';
$db['srsnav']['pconnect'] = 'production';
$db['srsnav']['db_debug'] = false;
$db['srsnav']['cache_on'] = FALSE;
$db['srsnav']['cachedir'] = '';
$db['srsnav']['char_set'] = 'utf8';
$db['srsnav']['dbcollat'] = 'utf8_general_ci';
$db['srsnav']['swap_pre'] = '';
$db['srsnav']['autoinit'] = FALSE;
$db['srsnav']['stricton'] = FALSE;


$db['srsnav_migration']['hostname'] = '192.168.107.100'; 
$db['srsnav_migration']['username'] = 'root';
$db['srsnav_migration']['password'] = 'srsnova';
$db['srsnav_migration']['database'] = 'migration';
$db['srsnav_migration']['dbdriver'] = 'mysqli';
$db['srsnav_migration']['dbprefix'] = '';
$db['srsnav_migration']['pconnect'] = 'production';
$db['srsnav_migration']['db_debug'] = false;
$db['srsnav_migration']['cache_on'] = FALSE;
$db['srsnav_migration']['cachedir'] = '';
$db['srsnav_migration']['char_set'] = 'utf8';
$db['srsnav_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsnav_migration']['swap_pre'] = '';
$db['srsnav_migration']['autoinit'] = FALSE;
$db['srsnav_migration']['stricton'] = FALSE;



#CAMARIN
$db['srsc']['hostname'] = '192.168.6.100'; 
$db['srsc']['username'] = 'root';
$db['srsc']['password'] = 'srsnova';
$db['srsc']['database'] = 'srs';
$db['srsc']['dbdriver'] = 'mysqli';
$db['srsc']['dbprefix'] = '';
$db['srsc']['pconnect'] = 'production';
$db['srsc']['db_debug'] = false;
$db['srsc']['cache_on'] = FALSE;
$db['srsc']['cachedir'] = '';
$db['srsc']['char_set'] = 'utf8';
$db['srsc']['dbcollat'] = 'utf8_general_ci';
$db['srsc']['swap_pre'] = '';
$db['srsc']['autoinit'] = FALSE;
$db['srsc']['stricton'] = FALSE;


$db['srsc_migration']['hostname'] = '192.168.6.100'; 
$db['srsc_migration']['username'] = 'root';
$db['srsc_migration']['password'] = 'srsnova';
$db['srsc_migration']['database'] = 'migration';
$db['srsc_migration']['dbdriver'] = 'mysqli';
$db['srsc_migration']['dbprefix'] = '';
$db['srsc_migration']['pconnect'] = 'production';
$db['srsc_migration']['db_debug'] = false;
$db['srsc_migration']['cache_on'] = FALSE;
$db['srsc_migration']['cachedir'] = '';
$db['srsc_migration']['char_set'] = 'utf8';
$db['srsc_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsc_migration']['swap_pre'] = '';
$db['srsc_migration']['autoinit'] = FALSE;
$db['srsc_migration']['stricton'] = FALSE;



#ANTIPOLO 1 - QUEZON
$db['srsant1']['hostname'] = '192.168.110.100'; 
$db['srsant1']['username'] = 'root';
$db['srsant1']['password'] = 'srsnova';
$db['srsant1']['database'] = 'srs';
$db['srsant1']['dbdriver'] = 'mysqli';
$db['srsant1']['dbprefix'] = '';
$db['srsant1']['pconnect'] = 'production';
$db['srsant1']['db_debug'] = false;
$db['srsant1']['cache_on'] = FALSE;
$db['srsant1']['cachedir'] = '';
$db['srsant1']['char_set'] = 'utf8';
$db['srsant1']['dbcollat'] = 'utf8_general_ci';
$db['srsant1']['swap_pre'] = '';
$db['srsant1']['autoinit'] = FALSE;
$db['srsant1']['stricton'] = FALSE;


$db['srsant1_migration']['hostname'] = '192.168.110.100'; 
$db['srsant1_migration']['username'] = 'root';
$db['srsant1_migration']['password'] = 'srsnova';
$db['srsant1_migration']['database'] = 'migration';
$db['srsant1_migration']['dbdriver'] = 'mysqli';
$db['srsant1_migration']['dbprefix'] = '';
$db['srsant1_migration']['pconnect'] = 'production';
$db['srsant1_migration']['db_debug'] = false;
$db['srsant1_migration']['cache_on'] = FALSE;
$db['srsant1_migration']['cachedir'] = '';
$db['srsant1_migration']['char_set'] = 'utf8';
$db['srsant1_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsant1_migration']['swap_pre'] = '';
$db['srsant1_migration']['autoinit'] = FALSE;
$db['srsant1_migration']['stricton'] = FALSE;



#ANTIPOLO 2 - MANALO
$db['srsant2']['hostname'] = '192.168.111.100'; 
$db['srsant2']['username'] = 'root';
$db['srsant2']['password'] = 'srsnova';
$db['srsant2']['database'] = 'srs';
$db['srsant2']['dbdriver'] = 'mysqli';
$db['srsant2']['dbprefix'] = '';
$db['srsant2']['pconnect'] = 'production';
$db['srsant2']['db_debug'] = false;
$db['srsant2']['cache_on'] = FALSE;
$db['srsant2']['cachedir'] = '';
$db['srsant2']['char_set'] = 'utf8';
$db['srsant2']['dbcollat'] = 'utf8_general_ci';
$db['srsant2']['swap_pre'] = '';
$db['srsant2']['autoinit'] = FALSE;
$db['srsant2']['stricton'] = FALSE;


$db['srsant2_migration']['hostname'] = '192.168.111.100'; 
$db['srsant2_migration']['username'] = 'root';
$db['srsant2_migration']['password'] = 'srsnova';
$db['srsant2_migration']['database'] = 'migration';
$db['srsant2_migration']['dbdriver'] = 'mysqli';
$db['srsant2_migration']['dbprefix'] = '';
$db['srsant2_migration']['pconnect'] = 'production';
$db['srsant2_migration']['db_debug'] = false;
$db['srsant2_migration']['cache_on'] = FALSE;
$db['srsant2_migration']['cachedir'] = '';    
$db['srsant2_migration']['char_set'] = 'utf8';
$db['srsant2_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsant2_migration']['swap_pre'] = '';
$db['srsant2_migration']['autoinit'] = FALSE;
$db['srsant2_migration']['stricton'] = FALSE;




#MALABON RESTO
$db['srsmr']['hostname'] = '192.168.101.100'; 
$db['srsmr']['username'] = 'root';
$db['srsmr']['password'] = 'srsnova';
$db['srsmr']['database'] = 'srs';
$db['srsmr']['dbdriver'] = 'mysqli';
$db['srsmr']['dbprefix'] = '';
$db['srsmr']['pconnect'] = 'production';
$db['srsmr']['db_debug'] = false;
$db['srsmr']['cache_on'] = FALSE;
$db['srsmr']['cachedir'] = '';
$db['srsmr']['char_set'] = 'utf8';
$db['srsmr']['dbcollat'] = 'utf8_general_ci';
$db['srsmr']['swap_pre'] = '';
$db['srsmr']['autoinit'] = FALSE;
$db['srsmr']['stricton'] = FALSE;



$db['srsmr_migration']['hostname'] = '192.168.101.100'; 
$db['srsmr_migration']['username'] = 'root';
$db['srsmr_migration']['password'] = 'srsnova';
$db['srsmr_migration']['database'] = 'migration';
$db['srsmr_migration']['dbdriver'] = 'mysqli';
$db['srsmr_migration']['dbprefix'] = '';
$db['srsmr_migration']['pconnect'] = 'production';
$db['srsmr_migration']['db_debug'] = false;
$db['srsmr_migration']['cache_on'] = FALSE;
$db['srsmr_migration']['cachedir'] = '';
$db['srsmr_migration']['char_set'] = 'utf8';
$db['srsmr_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsmr_migration']['swap_pre'] = '';
$db['srsmr_migration']['autoinit'] = FALSE;
$db['srsmr_migration']['stricton'] = FALSE;





#MALABON
$db['srsm']['hostname'] = '192.168.101.100'; 
$db['srsm']['username'] = 'root';
$db['srsm']['password'] = 'srsnova';
$db['srsm']['database'] = 'srs';
$db['srsm']['dbdriver'] = 'mysqli';
$db['srsm']['dbprefix'] = '';
$db['srsm']['pconnect'] = 'production';
$db['srsm']['db_debug'] = false;
$db['srsm']['cache_on'] = FALSE;
$db['srsm']['cachedir'] = '';
$db['srsm']['char_set'] = 'utf8';
$db['srsm']['dbcollat'] = 'utf8_general_ci';
$db['srsm']['swap_pre'] = '';
$db['srsm']['autoinit'] = FALSE;
$db['srsm']['stricton'] = FALSE;


$db['srsm_migration']['hostname'] = '192.168.101.100'; 
$db['srsm_migration']['username'] = 'root';
$db['srsm_migration']['password'] = 'srsnova';
$db['srsm_migration']['database'] = 'migration';
$db['srsm_migration']['dbdriver'] = 'mysqli';
$db['srsm_migration']['dbprefix'] = '';
$db['srsm_migration']['pconnect'] = 'production';
$db['srsm_migration']['db_debug'] = false;
$db['srsm_migration']['cache_on'] = FALSE;
$db['srsm_migration']['cachedir'] = '';
$db['srsm_migration']['char_set'] = 'utf8';
$db['srsm_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsm_migration']['swap_pre'] = '';
$db['srsm_migration']['autoinit'] = FALSE;
$db['srsm_migration']['stricton'] = FALSE;



#GAGALANGIN
$db['srsg']['hostname'] = '192.168.5.6'; 
$db['srsg']['username'] = 'root';
$db['srsg']['password'] = 'srsnova';
$db['srsg']['database'] = 'srs';
$db['srsg']['dbdriver'] = 'mysqli';
$db['srsg']['dbprefix'] = '';
$db['srsg']['pconnect'] = 'production';
$db['srsg']['db_debug'] = false;
$db['srsg']['cache_on'] = FALSE;
$db['srsg']['cachedir'] = '';
$db['srsg']['char_set'] = 'utf8';
$db['srsg']['dbcollat'] = 'utf8_general_ci';
$db['srsg']['swap_pre'] = '';
$db['srsg']['autoinit'] = FALSE;
$db['srsg']['stricton'] = FALSE;


$db['srsg_migration']['hostname'] = '192.168.5.6'; 
$db['srsg_migration']['username'] = 'root';
$db['srsg_migration']['password'] = 'srsnova';
$db['srsg_migration']['database'] = 'migration';
$db['srsg_migration']['dbdriver'] = 'mysqli';
$db['srsg_migration']['dbprefix'] = '';
$db['srsg_migration']['pconnect'] = 'production';
$db['srsg_migration']['db_debug'] = false;
$db['srsg_migration']['cache_on'] = FALSE;
$db['srsg_migration']['cachedir'] = '';
$db['srsg_migration']['char_set'] = 'utf8';
$db['srsg_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsg_migration']['swap_pre'] = '';
$db['srsg_migration']['autoinit'] = FALSE;
$db['srsg_migration']['stricton'] = FALSE;



#CAINTA
$db['srscain']['hostname'] = '192.168.112.100'; 
$db['srscain']['username'] = 'root';
$db['srscain']['password'] = 'srsnova';
$db['srscain']['database'] = 'srs';
$db['srscain']['dbdriver'] = 'mysqli';
$db['srscain']['dbprefix'] = '';
$db['srscain']['pconnect'] = 'production';
$db['srscain']['db_debug'] = false;
$db['srscain']['cache_on'] = FALSE;
$db['srscain']['cachedir'] = '';
$db['srscain']['char_set'] = 'utf8';
$db['srscain']['dbcollat'] = 'utf8_general_ci';
$db['srscain']['swap_pre'] = '';
$db['srscain']['autoinit'] = FALSE;
$db['srscain']['stricton'] = FALSE;


$db['srscain_migration']['hostname'] = '192.168.112.100'; 
$db['srscain_migration']['username'] = 'root';
$db['srscain_migration']['password'] = 'srsnova';
$db['srscain_migration']['database'] = 'migration';
$db['srscain_migration']['dbdriver'] = 'mysqli';
$db['srscain_migration']['dbprefix'] = '';
$db['srscain_migration']['pconnect'] = 'production';
$db['srscain_migration']['db_debug'] = false;
$db['srscain_migration']['cache_on'] = FALSE;
$db['srscain_migration']['cachedir'] = '';
$db['srscain_migration']['char_set'] = 'utf8';
$db['srscain_migration']['dbcollat'] = 'utf8_general_ci';
$db['srscain_migration']['swap_pre'] = '';
$db['srscain_migration']['autoinit'] = FALSE;
$db['srscain_migration']['stricton'] = FALSE;



#VALENZUELA
$db['srsval']['hostname'] = '192.168.114.100'; 
$db['srsval']['username'] = 'root';
$db['srsval']['password'] = 'srsnova';
$db['srsval']['database'] = 'srs';
$db['srsval']['dbdriver'] = 'mysqli';
$db['srsval']['dbprefix'] = '';
$db['srsval']['pconnect'] = 'production';
$db['srsval']['db_debug'] = false;
$db['srsval']['cache_on'] = FALSE;
$db['srsval']['cachedir'] = '';
$db['srsval']['char_set'] = 'utf8';
$db['srsval']['dbcollat'] = 'utf8_general_ci';
$db['srsval']['swap_pre'] = '';
$db['srsval']['autoinit'] = FALSE;
$db['srsval']['stricton'] = FALSE;


$db['srsval_migration']['hostname'] = '192.168.114.100'; 
$db['srsval_migration']['username'] = 'root';
$db['srsval_migration']['password'] = 'srsnova';
$db['srsval_migration']['database'] = 'migration';
$db['srsval_migration']['dbdriver'] = 'mysqli';
$db['srsval_migration']['dbprefix'] = '';
$db['srsval_migration']['pconnect'] = 'production';
$db['srsval_migration']['db_debug'] = false;
$db['srsval_migration']['cache_on'] = FALSE;
$db['srsval_migration']['cachedir'] = '';
$db['srsval_migration']['char_set'] = 'utf8';
$db['srsval_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsval_migration']['swap_pre'] = '';
$db['srsval_migration']['autoinit'] = FALSE;
$db['srsval_migration']['stricton'] = FALSE;



#PUNTURIN
$db['srspun']['hostname'] = '192.168.115.100.'; 
$db['srspun']['username'] = 'root';
$db['srspun']['password'] = 'srsnova';
$db['srspun']['database'] = 'srs';
$db['srspun']['dbdriver'] = 'mysqli';
$db['srspun']['dbprefix'] = '';
$db['srspun']['pconnect'] = 'production';
$db['srspun']['db_debug'] = false;
$db['srspun']['cache_on'] = FALSE;
$db['srspun']['cachedir'] = '';
$db['srspun']['char_set'] = 'utf8';
$db['srspun']['dbcollat'] = 'utf8_general_ci';
$db['srspun']['swap_pre'] = '';
$db['srspun']['autoinit'] = FALSE;
$db['srspun']['stricton'] = FALSE;


$db['srspun_migration']['hostname'] = '192.168.115.100'; 
$db['srspun_migration']['username'] = 'root';
$db['srspun_migration']['password'] = 'srsnova';
$db['srspun_migration']['database'] = 'migration';
$db['srspun_migration']['dbdriver'] = 'mysqli';
$db['srspun_migration']['dbprefix'] = '';
$db['srspun_migration']['pconnect'] = 'production';
$db['srspun_migration']['db_debug'] = false;
$db['srspun_migration']['cache_on'] = FALSE;
$db['srspun_migration']['cachedir'] = '';
$db['srspun_migration']['char_set'] = 'utf8';
$db['srspun_migration']['dbcollat'] = 'utf8_general_ci';
$db['srspun_migration']['swap_pre'] = '';
$db['srspun_migration']['autoinit'] = FALSE;
$db['srspun_migration']['stricton'] = FALSE;



#PATEROS
$db['srspat']['hostname'] = '192.168.116.100'; 
$db['srspat']['username'] = 'root';
$db['srspat']['password'] = 'srsnova';
$db['srspat']['database'] = 'srs';
$db['srspat']['dbdriver'] = 'mysqli';
$db['srspat']['dbprefix'] = '';
$db['srspat']['pconnect'] = 'production';
$db['srspat']['db_debug'] = FALSE;
$db['srspat']['cache_on'] = FALSE;
$db['srspat']['cachedir'] = '';
$db['srspat']['char_set'] = 'utf8';
$db['srspat']['dbcollat'] = 'utf8_general_ci';
$db['srspat']['swap_pre'] = '';
$db['srspat']['autoinit'] = FALSE;
$db['srspat']['stricton'] = FALSE;


$db['srspat_migration']['hostname'] = '192.168.116.100'; 
$db['srspat_migration']['username'] = 'root';
$db['srspat_migration']['password'] = 'srsnova';
$db['srspat_migration']['database'] = 'migration';
$db['srspat_migration']['dbdriver'] = 'mysqli';
$db['srspat_migration']['dbprefix'] = '';
$db['srspat_migration']['pconnect'] = 'production';
$db['srspat_migration']['db_debug'] = FALSE;
$db['srspat_migration']['cache_on'] = FALSE;
$db['srspat_migration']['cachedir'] = '';
$db['srspat_migration']['char_set'] = 'utf8';
$db['srspat_migration']['dbcollat'] = 'utf8_general_ci';
$db['srspat_migration']['swap_pre'] = '';
$db['srspat_migration']['autoinit'] = FALSE;
$db['srspat_migration']['stricton'] = FALSE;



#BAGONG SILANG
$db['srsbsl']['hostname'] = '192.168.5.38'; 
$db['srsbsl']['username'] = 'root';
$db['srsbsl']['password'] = 'srsnova';
$db['srsbsl']['database'] = 'srs';
$db['srsbsl']['dbdriver'] = 'mysqli';
$db['srsbsl']['dbprefix'] = '';
$db['srsbsl']['pconnect'] = 'production';
$db['srsbsl']['db_debug'] = FALSE;
$db['srsbsl']['cache_on'] = FALSE;
$db['srsbsl']['cachedir'] = '';
$db['srsbsl']['char_set'] = 'utf8';
$db['srsbsl']['dbcollat'] = 'utf8_general_ci';
$db['srsbsl']['swap_pre'] = '';
$db['srsbsl']['autoinit'] = FALSE;
$db['srsbsl']['stricton'] = FALSE;


$db['srsbsl_migration']['hostname'] = '192.168.5.38'; 
$db['srsbsl_migration']['username'] = 'root';
$db['srsbsl_migration']['password'] = 'srsnova';
$db['srsbsl_migration']['database'] = 'migration';
$db['srsbsl_migration']['dbdriver'] = 'mysqli';
$db['srsbsl_migration']['dbprefix'] = '';
$db['srsbsl_migration']['pconnect'] = 'production';
$db['srsbsl_migration']['db_debug'] = TRUE;
$db['srsbsl_migration']['cache_on'] = FALSE;
$db['srsbsl_migration']['cachedir'] = '';
$db['srsbsl_migration']['char_set'] = 'utf8';
$db['srsbsl_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsbsl_migration']['swap_pre'] = '';
$db['srsbsl_migration']['autoinit'] = FALSE;
$db['srsbsl_migration']['stricton'] = FALSE;



#COMEMBO
$db['srscom']['hostname'] = '192.168.117.100'; 
$db['srscom']['username'] = 'root';
$db['srscom']['password'] = 'srsnova';
$db['srscom']['database'] = 'srs';
$db['srscom']['dbdriver'] = 'mysqli';
$db['srscom']['dbprefix'] = '';
$db['srscom']['pconnect'] = 'production';
$db['srscom']['db_debug'] = false;
$db['srscom']['cache_on'] = FALSE;
$db['srscom']['cachedir'] = '';
$db['srscom']['char_set'] = 'utf8';
$db['srscom']['dbcollat'] = 'utf8_general_ci';
$db['srscom']['swap_pre'] = '';
$db['srscom']['autoinit'] = FALSE;
$db['srscom']['stricton'] = FALSE;


$db['srscom_migration']['hostname'] = '192.168.117.100'; 
$db['srscom_migration']['username'] = 'root';
$db['srscom_migration']['password'] = 'srsnova';
$db['srscom_migration']['database'] = 'migration';
$db['srscom_migration']['dbdriver'] = 'mysqli';
$db['srscom_migration']['dbprefix'] = '';
$db['srscom_migration']['pconnect'] = 'production';
$db['srscom_migration']['db_debug'] = false;
$db['srscom_migration']['cache_on'] = FALSE;
$db['srscom_migration']['cachedir'] = '';
$db['srscom_migration']['char_set'] = 'utf8';
$db['srscom_migration']['dbcollat'] = 'utf8_general_ci';
$db['srscom_migration']['swap_pre'] = '';
$db['srscom_migration']['autoinit'] = FALSE;
$db['srscom_migration']['stricton'] = FALSE;



#CAINTA 2
$db['srscain2']['hostname'] = '192.168.118.100'; 
$db['srscain2']['username'] = 'root';
$db['srscain2']['password'] = 'srsnova';
$db['srscain2']['database'] = 'srs';
$db['srscain2']['dbdriver'] = 'mysqli';
$db['srscain2']['dbprefix'] = '';
$db['srscain2']['pconnect'] = 'production';
$db['srscain2']['db_debug'] = false;
$db['srscain2']['cache_on'] = FALSE;
$db['srscain2']['cachedir'] = '';
$db['srscain2']['char_set'] = 'utf8';
$db['srscain2']['dbcollat'] = 'utf8_general_ci';
$db['srscain2']['swap_pre'] = '';
$db['srscain2']['autoinit'] = FALSE;
$db['srscain2']['stricton'] = FALSE;


$db['srscain2_migration']['hostname'] = '192.168.118.100'; 
$db['srscain2_migration']['username'] = 'root';
$db['srscain2_migration']['password'] = 'srsnova';
$db['srscain2_migration']['database'] = 'migration';
$db['srscain2_migration']['dbdriver'] = 'mysqli';
$db['srscain2_migration']['dbprefix'] = '';
$db['srscain2_migration']['pconnect'] = 'production';
$db['srscain2_migration']['db_debug'] = false;
$db['srscain2_migration']['cache_on'] = FALSE;
$db['srscain2_migration']['cachedir'] = '';
$db['srscain2_migration']['char_set'] = 'utf8';
$db['srscain2_migration']['dbcollat'] = 'utf8_general_ci';
$db['srscain2_migration']['swap_pre'] = '';
$db['srscain2_migration']['autoinit'] = FALSE;
$db['srscain2_migration']['stricton'] = FALSE;



#SAN PEDRO
$db['srssanp']['hostname'] = '192.168.119.100'; 
$db['srssanp']['username'] = 'root';
$db['srssanp']['password'] = 'srsnova';
$db['srssanp']['database'] = 'srs';
$db['srssanp']['dbdriver'] = 'mysqli';
$db['srssanp']['dbprefix'] = '';
$db['srssanp']['pconnect'] = 'production';
$db['srssanp']['db_debug'] = false;
$db['srssanp']['cache_on'] = FALSE;
$db['srssanp']['cachedir'] = '';
$db['srssanp']['char_set'] = 'utf8';
$db['srssanp']['dbcollat'] = 'utf8_general_ci';
$db['srssanp']['swap_pre'] = '';
$db['srssanp']['autoinit'] = FALSE;
$db['srssanp']['stricton'] = FALSE;


$db['srssanp_migration']['hostname'] = '192.168.119.100'; 
$db['srssanp_migration']['username'] = 'root';
$db['srssanp_migration']['password'] = 'srsnova';
$db['srssanp_migration']['database'] = 'migration';
$db['srssanp_migration']['dbdriver'] = 'mysqli';
$db['srssanp_migration']['dbprefix'] = '';
$db['srssanp_migration']['pconnect'] = 'production';
$db['srssanp_migration']['db_debug'] = false;
$db['srssanp_migration']['cache_on'] = FALSE;
$db['srssanp_migration']['cachedir'] = '';
$db['srssanp_migration']['char_set'] = 'utf8';
$db['srssanp_migration']['dbcollat'] = 'utf8_general_ci';
$db['srssanp_migration']['swap_pre'] = '';
$db['srssanp_migration']['autoinit'] = FALSE;
$db['srssanp_migration']['stricton'] = FALSE;



#TALON UNO
$db['srstu']['hostname'] = '192.168.132.100'; 
$db['srstu']['username'] = 'root';
$db['srstu']['password'] = 'srsnova';
$db['srstu']['database'] = 'srs';
$db['srstu']['dbdriver'] = 'mysqli';
$db['srstu']['dbprefix'] = '';
$db['srstu']['pconnect'] = 'production';
$db['srstu']['db_debug'] = false;
$db['srstu']['cache_on'] = FALSE;
$db['srstu']['cachedir'] = '';
$db['srstu']['char_set'] = 'utf8';
$db['srstu']['dbcollat'] = 'utf8_general_ci';
$db['srstu']['swap_pre'] = '';
$db['srstu']['autoinit'] = FALSE;
$db['srstu']['stricton'] = FALSE;


$db['srstu_migration']['hostname'] = '192.168.132.100'; 
$db['srstu_migration']['username'] = 'root';
$db['srstu_migration']['password'] = 'srsnova';
$db['srstu_migration']['database'] = 'migration';
$db['srstu_migration']['dbdriver'] = 'mysqli';
$db['srstu_migration']['dbprefix'] = '';
$db['srstu_migration']['pconnect'] = 'production';
$db['srstu_migration']['db_debug'] = false;
$db['srstu_migration']['cache_on'] = FALSE;
$db['srstu_migration']['cachedir'] = '';
$db['srstu_migration']['char_set'] = 'utf8';
$db['srstu_migration']['dbcollat'] = 'utf8_general_ci';
$db['srstu_migration']['swap_pre'] = '';
$db['srstu_migration']['autoinit'] = FALSE;
$db['srstu_migration']['stricton'] = FALSE;



#ALAMINOS
$db['srsal']['hostname'] = '192.168.20.100'; 
$db['srsal']['username'] = 'root';
$db['srsal']['password'] = 'srsnova';
$db['srsal']['database'] = 'srs';
$db['srsal']['dbdriver'] = 'mysqli';
$db['srsal']['dbprefix'] = '';
$db['srsal']['pconnect'] = 'production';
$db['srsal']['db_debug'] = false;
$db['srsal']['cache_on'] = FALSE;
$db['srsal']['cachedir'] = '';
$db['srsal']['char_set'] = 'utf8';
$db['srsal']['dbcollat'] = 'utf8_general_ci';
$db['srsal']['swap_pre'] = '';
$db['srsal']['autoinit'] = FALSE;
$db['srsal']['stricton'] = FALSE;


$db['srsal_migration']['hostname'] = '192.168.20.100'; 
$db['srsal_migration']['username'] = 'root';
$db['srsal_migration']['password'] = 'srsnova';
$db['srsal_migration']['database'] = 'migration';
$db['srsal_migration']['dbdriver'] = 'mysqli';
$db['srsal_migration']['dbprefix'] = '';
$db['srsal_migration']['pconnect'] = 'production';
$db['srsal_migration']['db_debug'] = false;
$db['srsal_migration']['cache_on'] = FALSE;
$db['srsal_migration']['cachedir'] = '';
$db['srsal_migration']['char_set'] = 'utf8';
$db['srsal_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsal_migration']['swap_pre'] = '';
$db['srsal_migration']['autoinit'] = FALSE;
$db['srsal_migration']['stricton'] = FALSE;



#BAGUMBONG
$db['srsbgb']['hostname'] = '192.168.106.121'; 
$db['srsbgb']['username'] = 'root';
$db['srsbgb']['password'] = 'srsnova';
$db['srsbgb']['database'] = 'srs';
$db['srsbgb']['dbdriver'] = 'mysqli';
$db['srsbgb']['dbprefix'] = '';
$db['srsbgb']['pconnect'] = 'production';
$db['srsbgb']['db_debug'] = false;
$db['srsbgb']['cache_on'] = FALSE;
$db['srsbgb']['cachedir'] = '';
$db['srsbgb']['char_set'] = 'utf8';
$db['srsbgb']['dbcollat'] = 'utf8_general_ci';
$db['srsbgb']['swap_pre'] = '';
$db['srsbgb']['autoinit'] = FALSE;
$db['srsbgb']['stricton'] = FALSE;


$db['srsbgb_migration']['hostname'] = '192.168.106.121'; 
$db['srsbgb_migration']['username'] = 'root';
$db['srsbgb_migration']['password'] = 'srsnova';
$db['srsbgb_migration']['database'] = 'migration';
$db['srsbgb_migration']['dbdriver'] = 'mysqli';
$db['srsbgb_migration']['dbprefix'] = '';
$db['srsbgb_migration']['pconnect'] = 'production';
$db['srsbgb_migration']['db_debug'] = false;
$db['srsbgb_migration']['cache_on'] = FALSE;
$db['srsbgb_migration']['cachedir'] = '';
$db['srsbgb_migration']['char_set'] = 'utf8';
$db['srsbgb_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsbgb_migration']['swap_pre'] = '';
$db['srsbgb_migration']['autoinit'] = FALSE;
$db['srsbgb_migration']['stricton'] = FALSE;



#GRACEVILLE
$db['srsgv']['hostname'] = '192.168.102.100'; 
$db['srsgv']['username'] = 'root';
$db['srsgv']['password'] = 'srsnova';
$db['srsgv']['database'] = 'srs';
$db['srsgv']['dbdriver'] = 'mysqli';
$db['srsgv']['dbprefix'] = '';
$db['srsgv']['pconnect'] = 'production';
$db['srsgv']['db_debug'] = FALSE;
$db['srsgv']['cache_on'] = FALSE;
$db['srsgv']['cachedir'] = '';
$db['srsgv']['char_set'] = 'utf8';
$db['srsgv']['dbcollat'] = 'utf8_general_ci';
$db['srsgv']['swap_pre'] = '';
$db['srsgv']['autoinit'] = FALSE;
$db['srsgv']['stricton'] = FALSE;


$db['srsgv_migration']['hostname'] = '192.168.102.100'; 
$db['srsgv_migration']['username'] = 'root';
$db['srsgv_migration']['password'] = 'srsnova';
$db['srsgv_migration']['database'] = 'migration';
$db['srsgv_migration']['dbdriver'] = 'mysqli';
$db['srsgv_migration']['dbprefix'] = '';
$db['srsgv_migration']['pconnect'] = 'production';
$db['srsgv_migration']['db_debug'] = FALSE;
$db['srsgv_migration']['cache_on'] = FALSE;
$db['srsgv_migration']['cachedir'] = '';
$db['srsgv_migration']['char_set'] = 'utf8';
$db['srsgv_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsgv_migration']['swap_pre'] = '';
$db['srsgv_migration']['autoinit'] = FALSE;
$db['srsgv_migration']['stricton'] = FALSE;



#MOLINO
$db['srsmol']['hostname'] = '192.168.122.100'; 
$db['srsmol']['username'] = 'root';
$db['srsmol']['password'] = 'srsnova';
$db['srsmol']['database'] = 'srs';
$db['srsmol']['dbdriver'] = 'mysqli';
$db['srsmol']['dbprefix'] = '';
$db['srsmol']['pconnect'] = 'production';
$db['srsmol']['db_debug'] = false;
$db['srsmol']['cache_on'] = FALSE;
$db['srsmol']['cachedir'] = '';
$db['srsmol']['char_set'] = 'utf8';
$db['srsmol']['dbcollat'] = 'utf8_general_ci';
$db['srsmol']['swap_pre'] = '';
$db['srsmol']['autoinit'] = FALSE;
$db['srsmol']['stricton'] = FALSE;


$db['srsmol_migration']['hostname'] = '192.168.122.100'; 
$db['srsmol_migration']['username'] = 'root';
$db['srsmol_migration']['password'] = 'srsnova';
$db['srsmol_migration']['database'] = 'migration';
$db['srsmol_migration']['dbdriver'] = 'mysqli';
$db['srsmol_migration']['dbprefix'] = '';
$db['srsmol_migration']['pconnect'] = 'production';
$db['srsmol_migration']['db_debug'] = false;
$db['srsmol_migration']['cache_on'] = FALSE;
$db['srsmol_migration']['cachedir'] = '';
$db['srsmol_migration']['char_set'] = 'utf8';
$db['srsmol_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsmol_migration']['swap_pre'] = '';
$db['srsmol_migration']['autoinit'] = FALSE;
$db['srsmol_migration']['stricton'] = FALSE;



#MANGGAHAN
$db['srsman']['hostname'] = '192.168.124.100'; 
$db['srsman']['username'] = 'root';
$db['srsman']['password'] = 'srsnova';
$db['srsman']['database'] = 'srs';
$db['srsman']['dbdriver'] = 'mysqli';
$db['srsman']['dbprefix'] = '';
$db['srsman']['pconnect'] = 'production';
$db['srsman']['db_debug'] = false;
$db['srsman']['cache_on'] = FALSE;
$db['srsman']['cachedir'] = '';
$db['srsman']['char_set'] = 'utf8';
$db['srsman']['dbcollat'] = 'utf8_general_ci';
$db['srsman']['swap_pre'] = '';
$db['srsman']['autoinit'] = FALSE;
$db['srsman']['stricton'] = FALSE;


$db['srsman_migration']['hostname'] = '192.168.124.100'; 
$db['srsman_migration']['username'] = 'root';
$db['srsman_migration']['password'] = 'srsnova';
$db['srsman_migration']['database'] = 'migration';
$db['srsman_migration']['dbdriver'] = 'mysqli';
$db['srsman_migration']['dbprefix'] = '';
$db['srsman_migration']['pconnect'] = 'production';
$db['srsman_migration']['db_debug'] = false;
$db['srsman_migration']['cache_on'] = FALSE;
$db['srsman_migration']['cachedir'] = '';
$db['srsman_migration']['char_set'] = 'utf8';
$db['srsman_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsman_migration']['swap_pre'] = '';
$db['srsman_migration']['autoinit'] = FALSE;
$db['srsman_migration']['stricton'] = FALSE;



#SAPANG PALAY
$db['srspalay']['hostname'] = '192.168.5.30'; 
$db['srspalay']['username'] = 'root';
$db['srspalay']['password'] = 'srsnova';
$db['srspalay']['database'] = 'srs';
$db['srspalay']['dbdriver'] = 'mysqli';
$db['srspalay']['dbprefix'] = '';
$db['srspalay']['pconnect'] = 'production';
$db['srspalay']['db_debug'] = false;
$db['srspalay']['cache_on'] = FALSE;
$db['srspalay']['cachedir'] = '';
$db['srspalay']['char_set'] = 'utf8';
$db['srspalay']['dbcollat'] = 'utf8_general_ci';
$db['srspalay']['swap_pre'] = '';
$db['srspalay']['autoinit'] = FALSE;
$db['srspalay']['stricton'] = FALSE;


$db['srspalay_migration']['hostname'] = '192.168.5.30'; 
$db['srspalay_migration']['username'] = 'root';
$db['srspalay_migration']['password'] = 'srsnova';
$db['srspalay_migration']['database'] = 'migration';
$db['srspalay_migration']['dbdriver'] = 'mysqli';
$db['srspalay_migration']['dbprefix'] = '';
$db['srspalay_migration']['pconnect'] = 'production';
$db['srspalay_migration']['db_debug'] = false;
$db['srspalay_migration']['cache_on'] = FALSE;
$db['srspalay_migration']['cachedir'] = '';
$db['srspalay_migration']['char_set'] = 'utf8';
$db['srspalay_migration']['dbcollat'] = 'utf8_general_ci';
$db['srspalay_migration']['swap_pre'] = '';
$db['srspalay_migration']['autoinit'] = FALSE;
$db['srspalay_migration']['stricton'] = FALSE;


#ISIDRO
$db['srsisidro']['hostname'] = '192.168.126.100'; 
$db['srsisidro']['username'] = 'root';
$db['srsisidro']['password'] = 'srsnova';
$db['srsisidro']['database'] = 'srs';
$db['srsisidro']['dbdriver'] = 'mysqli';
$db['srsisidro']['dbprefix'] = '';
$db['srsisidro']['pconnect'] = 'production';
$db['srsisidro']['db_debug'] = false;
$db['srsisidro']['cache_on'] = FALSE;
$db['srsisidro']['cachedir'] = '';
$db['srsisidro']['char_set'] = 'utf8';
$db['srsisidro']['dbcollat'] = 'utf8_general_ci';
$db['srsisidro']['swap_pre'] = '';
$db['srsisidro']['autoinit'] = FALSE;
$db['srsisidro']['stricton'] = FALSE;


$db['srsisidro_migration']['hostname'] = '192.168.126.100'; 
$db['srsisidro_migration']['username'] = 'root';
$db['srsisidro_migration']['password'] = 'srsnova';
$db['srsisidro_migration']['database'] = 'migration';
$db['srsisidro_migration']['dbdriver'] = 'mysqli';
$db['srsisidro_migration']['dbprefix'] = '';
$db['srsisidro_migration']['pconnect'] = 'production';
$db['srsisidro_migration']['db_debug'] = false;
$db['srsisidro_migration']['cache_on'] = FALSE;
$db['srsisidro_migration']['cachedir'] = '';
$db['srsisidro_migration']['char_set'] = 'utf8';
$db['srsisidro_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsisidro_migration']['swap_pre'] = '';
$db['srsisidro_migration']['autoinit'] = FALSE;
$db['srsisidro_migration']['stricton'] = FALSE;





#AGORA
$db['srsagora']['hostname'] = '192.168.127.100'; 
$db['srsagora']['username'] = 'root';
$db['srsagora']['password'] = 'srsnova';
$db['srsagora']['database'] = 'srs';
$db['srsagora']['dbdriver'] = 'mysqli';
$db['srsagora']['dbprefix'] = '';
$db['srsagora']['pconnect'] = 'production';
$db['srsagora']['db_debug'] = false;
$db['srsagora']['cache_on'] = FALSE;
$db['srsagora']['cachedir'] = '';
$db['srsagora']['char_set'] = 'utf8';
$db['srsagora']['dbcollat'] = 'utf8_general_ci';
$db['srsagora']['swap_pre'] = '';
$db['srsagora']['autoinit'] = FALSE;
$db['srsagora']['stricton'] = FALSE;


$db['srsagora_migration']['hostname'] = '192.168.127.100'; 
$db['srsagora_migration']['username'] = 'root';
$db['srsagora_migration']['password'] = 'srsnova';
$db['srsagora_migration']['database'] = 'migration';
$db['srsagora_migration']['dbdriver'] = 'mysqli';
$db['srsagora_migration']['dbprefix'] = '';
$db['srsagora_migration']['pconnect'] = 'production';
$db['srsagora_migration']['db_debug'] = false;
$db['srsagora_migration']['cache_on'] = FALSE;
$db['srsagora_migration']['cachedir'] = '';
$db['srsagora_migration']['char_set'] = 'utf8';
$db['srsagora_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsagora_migration']['swap_pre'] = '';
$db['srsagora_migration']['autoinit'] = FALSE;
$db['srsagora_migration']['stricton'] = FALSE;


#STAROSA
$db['srsstarosa']['hostname'] = '192.168.129.100'; 
$db['srsstarosa']['username'] = 'root';
$db['srsstarosa']['password'] = 'srsnova';
$db['srsstarosa']['database'] = 'srs';
$db['srsstarosa']['dbdriver'] = 'mysqli';
$db['srsstarosa']['dbprefix'] = '';
$db['srsstarosa']['pconnect'] = 'production';
$db['srsstarosa']['db_debug'] = false;
$db['srsstarosa']['cache_on'] = FALSE;
$db['srsstarosa']['cachedir'] = '';
$db['srsstarosa']['char_set'] = 'utf8';
$db['srsstarosa']['dbcollat'] = 'utf8_general_ci';
$db['srsstarosa']['swap_pre'] = '';
$db['srsstarosa']['autoinit'] = FALSE;
$db['srsstarosa']['stricton'] = FALSE;


$db['srsstarosa_migration']['hostname'] = '192.168.129.100'; 
$db['srsstarosa_migration']['username'] = 'root';
$db['srsstarosa_migration']['password'] = 'srsnova';
$db['srsstarosa_migration']['database'] = 'migration';
$db['srsstarosa_migration']['dbdriver'] = 'mysqli';
$db['srsstarosa_migration']['dbprefix'] = '';
$db['srsstarosa_migration']['pconnect'] = 'production';
$db['srsstarosa_migration']['db_debug'] = false;
$db['srsstarosa_migration']['cache_on'] = FALSE;
$db['srsstarosa_migration']['cachedir'] = '';
$db['srsstarosa_migration']['char_set'] = 'utf8';
$db['srsstarosa_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsstarosa_migration']['swap_pre'] = '';
$db['srsstarosa_migration']['autoinit'] = FALSE;
$db['srsstarosa_migration']['stricton'] = FALSE;


#MARILAO
$db['srsmar']['hostname'] = '192.168.128.100'; 
$db['srsmar']['username'] = 'root';
$db['srsmar']['password'] = 'srsnova';
$db['srsmar']['database'] = 'srs';
$db['srsmar']['dbdriver'] = 'mysqli';
$db['srsmar']['dbprefix'] = '';
$db['srsmar']['pconnect'] = 'production';
$db['srsmar']['db_debug'] = false;
$db['srsmar']['cache_on'] = FALSE;
$db['srsmar']['cachedir'] = '';
$db['srsmar']['char_set'] = 'utf8';
$db['srsmar']['dbcollat'] = 'utf8_general_ci';
$db['srsmar']['swap_pre'] = '';
$db['srsmar']['autoinit'] = FALSE;
$db['srsmar']['stricton'] = FALSE;


$db['srsmar_migration']['hostname'] = '192.168.128.100'; 
$db['srsmar_migration']['username'] = 'root';
$db['srsmar_migration']['password'] = 'srsnova';
$db['srsmar_migration']['database'] = 'migration';
$db['srsmar_migration']['dbdriver'] = 'mysqli';
$db['srsmar_migration']['dbprefix'] = '';
$db['srsmar_migration']['pconnect'] = 'production';
$db['srsmar_migration']['db_debug'] = false;
$db['srsmar_migration']['cache_on'] = FALSE;
$db['srsmar_migration']['cachedir'] = '';
$db['srsmar_migration']['char_set'] = 'utf8';
$db['srsmar_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsmar_migration']['swap_pre'] = '';
$db['srsmar_migration']['autoinit'] = FALSE;
$db['srsmar_migration']['stricton'] = FALSE;



#MARILAO
$db['srsbsl2']['hostname'] = '192.168.130.100'; 
$db['srsbsl2']['username'] = 'root';
$db['srsbsl2']['password'] = 'srsnova';
$db['srsbsl2']['database'] = 'srs';
$db['srsbsl2']['dbdriver'] = 'mysqli';
$db['srsbsl2']['dbprefix'] = '';
$db['srsbsl2']['pconnect'] = 'production';
$db['srsbsl2']['db_debug'] = false;
$db['srsbsl2']['cache_on'] = FALSE;
$db['srsbsl2']['cachedir'] = '';
$db['srsbsl2']['char_set'] = 'utf8';
$db['srsbsl2']['dbcollat'] = 'utf8_general_ci';
$db['srsbsl2']['swap_pre'] = '';
$db['srsbsl2']['autoinit'] = FALSE;
$db['srsbsl2']['stricton'] = FALSE;


$db['srsbsl2_migration']['hostname'] = '192.168.130.100'; 
$db['srsbsl2_migration']['username'] = 'root';
$db['srsbsl2_migration']['password'] = 'srsnova';
$db['srsbsl2_migration']['database'] = 'migration';
$db['srsbsl2_migration']['dbdriver'] = 'mysqli';
$db['srsbsl2_migration']['dbprefix'] = '';
$db['srsbsl2_migration']['pconnect'] = 'production';
$db['srsbsl2_migration']['db_debug'] = false;
$db['srsbsl2_migration']['cache_on'] = FALSE;
$db['srsbsl2_migration']['cachedir'] = '';
$db['srsbsl2_migration']['char_set'] = 'utf8';
$db['srsbsl2_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsbsl2_migration']['swap_pre'] = '';
$db['srsbsl2_migration']['autoinit'] = FALSE;
$db['srsbsl2_migration']['stricton'] = FALSE;

#TANZA
$db['srstanza']['hostname'] = '192.168.5.29'; 
$db['srstanza']['username'] = 'root';
$db['srstanza']['password'] = 'srsnova';
$db['srstanza']['database'] = 'srs';
$db['srstanza']['dbdriver'] = 'mysqli';
$db['srstanza']['dbprefix'] = '';
$db['srstanza']['pconnect'] = 'production';
$db['srstanza']['db_debug'] = false;
$db['srstanza']['cache_on'] = FALSE;
$db['srstanza']['cachedir'] = '';
$db['srstanza']['char_set'] = 'utf8';
$db['srstanza']['dbcollat'] = 'utf8_general_ci';
$db['srstanza']['swap_pre'] = '';
$db['srstanza']['autoinit'] = FALSE;
$db['srstanza']['stricton'] = FALSE;


$db['srstanza_migration']['hostname'] = '192.168.5.29'; 
$db['srstanza_migration']['username'] = 'root';
$db['srstanza_migration']['password'] = 'srsnova';
$db['srstanza_migration']['database'] = 'migration';
$db['srstanza_migration']['dbdriver'] = 'mysqli';
$db['srstanza_migration']['dbprefix'] = '';
$db['srstanza_migration']['pconnect'] = 'production';
$db['srstanza_migration']['db_debug'] = false;
$db['srstanza_migration']['cache_on'] = FALSE;
$db['srstanza_migration']['cachedir'] = '';
$db['srstanza_migration']['char_set'] = 'utf8';
$db['srstanza_migration']['dbcollat'] = 'utf8_general_ci';
$db['srstanza_migration']['swap_pre'] = '';
$db['srstanza_migration']['autoinit'] = FALSE;
$db['srstanza_migration']['stricton'] = FALSE;




#stamaria
$db['srsstamaria']['hostname'] = '192.168.5.26'; 
$db['srsstamaria']['username'] = 'root';
$db['srsstamaria']['password'] = 'srsnova';
$db['srsstamaria']['database'] = 'srs';
$db['srsstamaria']['dbdriver'] = 'mysqli';
$db['srsstamaria']['dbprefix'] = '';
$db['srsstamaria']['pconnect'] = 'production';
$db['srsstamaria']['db_debug'] = false;
$db['srsstamaria']['cache_on'] = FALSE;
$db['srsstamaria']['cachedir'] = '';
$db['srsstamaria']['char_set'] = 'utf8';
$db['srsstamaria']['dbcollat'] = 'utf8_general_ci';
$db['srsstamaria']['swap_pre'] = '';
$db['srsstamaria']['autoinit'] = FALSE;
$db['srsstamaria']['stricton'] = FALSE;



$db['srsstamaria_migration']['hostname'] = '192.168.5.26'; 
$db['srsstamaria_migration']['username'] = 'root';
$db['srsstamaria_migration']['password'] = 'srsnova';
$db['srsstamaria_migration']['database'] = 'migration';
$db['srsstamaria_migration']['dbdriver'] = 'mysqli';
$db['srsstamaria_migration']['dbprefix'] = '';
$db['srsstamaria_migration']['pconnect'] = 'production';
$db['srsstamaria_migration']['db_debug'] = false;
$db['srsstamaria_migration']['cache_on'] = FALSE;
$db['srsstamaria_migration']['cachedir'] = '';
$db['srsstamaria_migration']['char_set'] = 'utf8';
$db['srsstamaria_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsstamaria_migration']['swap_pre'] = '';
$db['srsstamaria_migration']['autoinit'] = FALSE;
$db['srsstamaria_migration']['stricton'] = FALSE;


#brixton
$db['srsbrixton']['hostname'] = '192.168.5.42'; 
$db['srsbrixton']['username'] = 'root';
$db['srsbrixton']['password'] = 'srsnova';
$db['srsbrixton']['database'] = 'srs';
$db['srsbrixton']['dbdriver'] = 'mysqli';
$db['srsbrixton']['dbprefix'] = '';
$db['srsbrixton']['pconnect'] = 'production';
$db['srsbrixton']['db_debug'] = false;
$db['srsbrixton']['cache_on'] = FALSE;
$db['srsbrixton']['cachedir'] = '';
$db['srsbrixton']['char_set'] = 'utf8';
$db['srsbrixton']['dbcollat'] = 'utf8_general_ci';
$db['srsbrixton']['swap_pre'] = '';
$db['srsbrixton']['autoinit'] = FALSE;
$db['srsbrixton']['stricton'] = FALSE;



$db['srsbrixton_migration']['hostname'] = '192.168.5.42'; 
$db['srsbrixton_migration']['username'] = 'root';
$db['srsbrixton_migration']['password'] = 'srsnova';
$db['srsbrixton_migration']['database'] = 'migration';
$db['srsbrixton_migration']['dbdriver'] = 'mysqli';
$db['srsbrixton_migration']['dbprefix'] = '';
$db['srsbrixton_migration']['pconnect'] = 'production';
$db['srsbrixton_migration']['db_debug'] = false;
$db['srsbrixton_migration']['cache_on'] = FALSE;
$db['srsbrixton_migration']['cachedir'] = '';
$db['srsbrixton_migration']['char_set'] = 'utf8';
$db['srsbrixton_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsbrixton_migration']['swap_pre'] = '';
$db['srsbrixton_migration']['autoinit'] = FALSE;
$db['srsbrixton_migration']['stricton'] = FALSE;



#rosario
$db['srsrosario']['hostname'] = '192.168.5.45'; 
$db['srsrosario']['username'] = 'root';
$db['srsrosario']['password'] = 'srsnova';
$db['srsrosario']['database'] = 'srs';
$db['srsrosario']['dbdriver'] = 'mysqli';
$db['srsrosario']['dbprefix'] = '';
$db['srsrosario']['pconnect'] = 'production';
$db['srsrosario']['db_debug'] = false;
$db['srsrosario']['cache_on'] = FALSE;
$db['srsrosario']['cachedir'] = '';
$db['srsrosario']['char_set'] = 'utf8';
$db['srsrosario']['dbcollat'] = 'utf8_general_ci';
$db['srsrosario']['swap_pre'] = '';
$db['srsrosario']['autoinit'] = FALSE;
$db['srsrosario']['stricton'] = FALSE;



$db['srsrosario_migration']['hostname'] = '192.168.5.45'; 
$db['srsrosario_migration']['username'] = 'root';
$db['srsrosario_migration']['password'] = 'srsnova';
$db['srsrosario_migration']['database'] = 'migration';
$db['srsrosario_migration']['dbdriver'] = 'mysqli';
$db['srsrosario_migration']['dbprefix'] = '';
$db['srsrosario_migration']['pconnect'] = 'production';
$db['srsrosario_migration']['db_debug'] = false;
$db['srsrosario_migration']['cache_on'] = FALSE;
$db['srsrosario_migration']['cachedir'] = '';
$db['srsrosario_migration']['char_set'] = 'utf8';
$db['srsrosario_migration']['dbcollat'] = 'utf8_general_ci';
$db['srsrosario_migration']['swap_pre'] = '';
$db['srsrosario_migration']['autoinit'] = FALSE;
$db['srsrosario_migration']['stricton'] = FALSE;


$db['datacenter']['hostname'] = '192.168.0.100'; 
$db['datacenter']['username'] = 'markuser';
$db['datacenter']['password'] = 'tseug';
$db['datacenter']['database'] = 'NEWDATACENTER';
$db['datacenter']['dbdriver'] = 'mssql';
$db['datacenter']['dbprefix'] = '';
$db['datacenter']['pconnect'] = 'production';
$db['datacenter']['db_debug'] = false;
$db['datacenter']['cache_on'] = FALSE;
$db['datacenter']['cachedir'] = '';
$db['datacenter']['char_set'] = 'utf8';
$db['datacenter']['dbcollat'] = 'utf8_general_ci';
$db['datacenter']['swap_pre'] = '';
$db['datacenter']['autoinit'] = FALSE;
$db['datacenter']['stricton'] = FALSE;








?>