<?php

require_once 'popbill.php';

$LinkID = 'TESTER';
$SecretKey = 'okH3G1/WZ3w1PMjHDLaWdcWIa/dbTX3eGuqMZ5AvnDE=';


$PopbillService = new PopbillBase($LinkID,$SecretKey);

$PopbillService->IsTest(true);

echo substr($PopbillService->GetPopbillURL('1231212312','userid','LOGIN'),0,50). ' ...';
echo chr(10);

echo $PopbillService->GetBalance('1231212312');
echo chr(10);
echo $PopbillService->GetPartnerBalance('1231212312');
echo chr(10);

$joinForm = new JoinForm ();

$joinForm->LinkID 		= $LinkID;
$joinForm->CorpNum 		= '1231212312';
$joinForm->CEOName 		= '대표자성명';
$joinForm->CorpName 	= '테스트사업자상호';
$joinForm->Addr			= '테스트사업자주소';
$joinForm->ZipCode		= '사업장우편번호';
$joinForm->BizType		= '업태';
$joinForm->BizClass		= '업종';
$joinForm->ContactName	= '담당자상명';
$joinForm->ContactEmail	= 'tester@test.com';
$joinForm->ContactTEL	= '07075106766';
$joinForm->ID			= 'userid_php';
$joinForm->PWD			= 'thisispassword';

try
{
	$result = $PopbillService->JoinMember($joinForm);
}
catch(PopbillException $pe) {
	echo $pe;
	exit();
}
echo $result->message;

?>
