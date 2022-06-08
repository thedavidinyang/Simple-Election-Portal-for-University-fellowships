<?php 

$level = $me['level'];

$cbal = $me['cb'];

     $dl = countdl($me['dxid'], $me['level']);          

if($dl == 14){
	
	$level += 1;
}

//level 2 upgrade
if($level == 2 && $me['level'] == 1 && $dl == 14){

$it1 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $basic['cash'],
			'type' => 1,
			'amount' => $basic['total'],
			
		];
$it2 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $basic['food'],
			'type' => 0,
			'amount' => $basic['total'],
			
		];
		
		insertbon($it1);
		insertbon($it2);

	$levup = [
		'id' => $me['dxid'],
		'lev' => $level,
		'cb' => $cbal + $basic['total']
	];
		
		
		uplev($levup);
	
		
		$transif = "TAFC".transid();
		$tranza = [
			'transid' => $transif, 
			'uid' => $me['dxid'], 
			'type' => '0', 
			'amnt' => $basic['total'], 
			'descr' => "Complete Basic Stage", 
			'status'=> '1'			
		];
		
		instrans($tranza);
	
	

}

// level 3 upgrade
if($level == 3  && $me['level'] == 2 && $dl == 14){

$it1 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $bronze['cash'],
			'type' => 1,
			'amount' => $bronze['cash'],
			
		];
	
	
$it2 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $bronze['food'],
			'type' => 0,
			'amount' => $bronze['foodp'],
			
		];
		
		insertbon($it1);
		insertbon($it2);

	$levup = [
		'id' => $me['dxid'],
		'lev' => $level,
		'cb' => $cbal + $bronze['total']
	];
		
		
		uplev($levup);
	
		$transif = "TAFC".transid();
		$tranza = [
			'transid' => $transif, 
			'uid' => $me['dxid'], 
			'type' => '0', 
			'amnt' => $bronze['total'], 
			'descr' => "Complete Bronze Stage", 
			'status'=> '1'			
		];
		
		instrans($tranza);
	
	

}
//level 4 upgrade
if($level == 4  && $me['level'] == 3 && $dl == 14){

$it1 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $silver['cash'],
			'type' => 1,
			'amount' => $silver['cash'],
			
		];
	
	
$it2 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $silver['food'],
			'type' => 0,
			'amount' => $silver['foodp'],
			
		];
	
$it3 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $silver['item'],
			'type' => 0,
			'amount' => $silver['itemp'],
			
		];
		
		insertbon($it1);
		insertbon($it2);
		insertbon($it3);

	$levup = [
		'id' => $me['dxid'],
		'lev' => $level,
		'cb' => $cbal + $silver['total']
	];
		
		
		uplev($levup);
	
		$transif = "TAFC".transid();
		$tranza = [
			'transid' => $transif, 
			'uid' => $me['dxid'], 
			'type' => '0', 
			'amnt' => $silver['total'], 
			'descr' => "Complete Silver Stage", 
			'status'=> '1'			
		];
		
		instrans($tranza);
	

}

//level 5 upgrade
if($level == 5  && $me['level'] == 4 && $dl == 14){

$it1 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $gold['cash'],
			'type' => 1,
			'amount' => $gold['cash'],
			
		];
	
	
$it2 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $gold['food'],
			'type' => 0,
			'amount' => $gold['foodp'],
			
		];
	
$it3 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $gold['item'],
			'type' => 0,
			'amount' => $gold['itemp'],
			
		];
	
$it4 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $gold['item2'],
			'type' => 0,
			'amount' => $gold['item2p'],
			
		];
		
		insertbon($it1);
		insertbon($it2);
		insertbon($it3);
		insertbon($it4);

	$levup = [
		'id' => $me['dxid'],
		'lev' => $level,
		'cb' => $cbal + $gold['total']
	];
		
		
		uplev($levup);
	
		$transif = "TAFC".transid();
		$tranza = [
			'transid' => $transif, 
			'uid' => $me['dxid'], 
			'type' => '0', 
			'amnt' => $gold['total'], 
			'descr' => "Complete Gold Stage", 
			'status'=> '1'			
		];
		
		instrans($tranza);

}

if($level == 6  && $me['level'] == 5 && $dl == 14){

$it1 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['cash'],
			'type' => 1,
			'amount' => $diamond['cash'],
			
		];
	
	
$it2 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item1'],
			'type' => 0,
			'amount' => $diamond['item1p'],
			
		];
	
$it3 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item2'],
			'type' => 0,
			'amount' => $diamond['item2p'],
			
		];
	
$it4 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item3'],
			'type' => 0,
			'amount' => $diamond['item3p'],
			
		];
$it5 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item4'],
			'type' => 0,
			'amount' => $diamond['item4p'],
			
		];
$it6 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item5'],
			'type' => 0,
			'amount' => $diamond['item5p'],
			
		];
$it7 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item6'],
			'type' => 0,
			'amount' => $diamond['item6p'],
			
		];
$it8 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item7'],
			'type' => 0,
			'amount' => $diamond['item7p'],
			
		];
$it9 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item8'],
			'type' => 0,
			'amount' => $diamond['item8p'],
			
		];
$it10 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $diamond['item9'],
			'type' => 0,
			'amount' => $diamond['item9p'],
			
		];
		
		insertbon($it1);
		insertbon($it2);
		insertbon($it3);
		insertbon($it4);
		insertbon($it5);
		insertbon($it6);
		insertbon($it7);
		insertbon($it8);
		insertbon($it9);
		insertbon($it10);

	$levup = [
		'id' => $me['dxid'],
		'lev' => $level,
		'cb' => $cbal + $diamond['total']
	];
		
		
		uplev($levup);
	
		$tranza = [
			'transid' => $transif, 
			'uid' => $me['dxid'], 
			'type' => '0', 
			'amnt' => $diamond['total'], 
			'descr' => "Complete Diamond Stage", 
			'status'=> '1'			
		];
		
		instrans($tranza);

}


if($level == 7  && $me['level'] == 6 && $dl == 14){

$it1 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['cash'],
			'type' => 1,
			'amount' => $platinum['cash'],
			
		];
	
	
$it2 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item1'],
			'type' => 0,
			'amount' => $platinum['item1p'],
			
		];
	
$it3 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item2'],
			'type' => 0,
			'amount' => $platinum['item2p'],
			
		];
	
$it4 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item3'],
			'type' => 0,
			'amount' => $platinum['item3p'],
			
		];
$it5 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item4'],
			'type' => 0,
			'amount' => $platinum['item4p'],
			
		];
$it6 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item5'],
			'type' => 0,
			'amount' => $platinum['item5p'],
			
		];
$it7 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item6'],
			'type' => 0,
			'amount' => $platinum['item6p'],
			
		];
$it8 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item7'],
			'type' => 0,
			'amount' => $platinum['item7p'],
			
		];
$it9 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item8'],
			'type' => 0,
			'amount' => $platinum['item8p'],
			
		];
$it10 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item9'],
			'type' => 0,
			'amount' => $platinum['item9p'],
			
		];
$it11 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item10'],
			'type' => 0,
			'amount' => $platinum['item10p'],
			
		];
$it12 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item11'],
			'type' => 0,
			'amount' => $platinum['item11p'],
			
		];
$it13 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $platinum['item12'],
			'type' => 0,
			'amount' => $platinum['item12p'],
			
		];
		
		insertbon($it1);
		insertbon($it2);
		insertbon($it3);
		insertbon($it4);
		insertbon($it5);
		insertbon($it6);
		insertbon($it7);
		insertbon($it8);
		insertbon($it9);
		insertbon($it10);
		insertbon($it11);
		insertbon($it12);
		insertbon($it13);

	$levup = [
		'id' => $me['dxid'],
		'lev' => $level,
		'cb' => $cbal + $platinum['total']
	];
		
		
		uplev($levup);
	
		$tranza = [
			'transid' => $transif, 
			'uid' => $me['dxid'], 
			'type' => '0', 
			'amnt' => $platinum['total'], 
			'descr' => "Complete Platinum Stage", 
			'status'=> '1'			
		];
		
		instrans($tranza);

}

if($level == 8  && $me['level'] == 7 && $dl == 14){

$it1 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $eplatinum['item1'],
			'type' => 1,
			'amount' => $eplatinum['item1p'],
			
		];
	
	
$it2 = [
			'id' => $me['dxid'],
			'level' => $me['level'],
			'item' => $eplatinum['item2'],
			'type' => 0,
			'amount' => 0,
			
		];
	
		insertbon($it1);
		insertbon($it2);

	$levup = [
		'id' => $me['dxid'],
		'lev' => $level,
		'cb' => $cbal + $eplatinum['total']
	];
		
		
		uplev($levup);
	
			$tranza = [
			'transid' => $transif, 
			'uid' => $me['dxid'], 
			'type' => '0', 
			'amnt' => $eplatinum['total'], 
			'descr' => "Complete Executive Platinum Stage", 
			'status'=> '1'			
		];
		
		instrans($tranza);
	
	

}










?>
               
               
               
               
               
               
               
               
               
               
               
               
               
               
              