<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function __construct()
	{
		parent::__construct();	
		$this->load->helper('form');	
		// header("Cache-Control: no-cache, must-revalidate");
		// header('Access-Control-Allow-Origin: *'); 
		// header('Access-Control-Allow-Headers: X-Custom-Header');
		// header("Content-Type: application/json");

        // header('Content-Type: application/x-www-form-urlencoded');

        // header("Content-Type: application/json;charset=utf-8");
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Request-Headers: *');
        
        // header('Access-Control-Allow-Headers: content-type');
        // header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        // header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        // header("Cache-Control: no-store, no-cache, must-revalidate");
        // header("Cache-Control: post-check=0, pre-check=0", false);



		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: ACCEPT, CONTENT-TYPE, X-CSRF-TOKEN");
		header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"); 
	}
	
	public function index()
	{	
		$data = [];
		$method = $this->input->post_get('method');
			
		if(!$method)
		{
			$data=array(
					'post'=>$_POST,
					'get'=>$this->input->get(),
					'RESQUEST'=>$_REQUEST,
					'SERV'=>$_SERVER,
				);

			$json=json_decode(json_encode($_REQUEST,true));
			$cad='';

			foreach ($json as $k => $v)
			{
				$cad=$k.$v;
			}

			$obj=json_decode($cad,true);
			$this->evalua($obj['method']);

		} else {
			$this->evalua($method);
		}
	}

	public function evalua($method){

			switch ($method) {
				case 'authenticate':
					echo $this->authenticate();
					break;
				case 'getAcounts':
					echo $this->getAcounts();
					break;
				case 'getBan':
					echo $this->getBan();
					break;
				case 'getaccountdetails':
					echo $this->getaccountdetails();
					break;
				case 'getaccess':
					echo $this->getaccess();
					break;
				case 'gethobbies':
					echo $this->gethobbies();
					break;
				case 'getReferrAccountsAllStatus':
					echo $this->getReferrAccountsAllStatus();
					break;
				case 'getCreditsByAccount':
					echo $this->getCreditsByAccount();
					break;
				
				case 'GetGift1GBSend':
					echo $this->GetGift1GBSend();
					break;

				case 'getMember':
					echo $this->getMember();
					break;
				
				case 'getSharingMediaByUser':
					echo $this->getSharingMediaByUser();
					break;
				
				case 'getValidateReferrer':
					echo $this->getValidateReferrer();
					break;
				
				case 'getVerifyEmail':
					echo $this->getVerifyEmail();
					break;
				
				case 'RedeemCuponsByAccount':
					echo $this->RedeemCuponsByAccount();
					break;
				case 'sharedCupons':
					echo $this->sharedCupons();
					break;

				case 'getDirectDebitInfo2':
					echo $this->getDirectDebitInfo2();
					break;

				case 'GetOffersToSubscriber':
					echo $this->GetOffersToSubscriber();
					break;

				case 'ValidateCreditLimit':
					echo $this->ValidateCreditLimit();
					break;

				case 'GetSubscriber':
					echo $this->GetSubscriber();
					break;
				
				case 'AddGift1GB':
					echo $this->AddGift1GB();
					break;
				
				default:
					echo json_encode([]);
					break;
			}
	}

	public function AddGift1GB()
	{
		return '{"ErrorDesc":"Lo sentimos mucho, pero el suscriptor ingresado no cuenta con un plan que soporte un paquete de datos.","ErrorNum":0,"ErrorType":"","HasError":true,"paymentid":"","Gift1GBIDTransact":"0000003267"}';
	}

	public function GetSubscriber()
	{
		return '{"Desc":null,"ErrorDesc":null,"HasError":false,"token":"a591db5426e5917db8f20e4272e4t2c9","ADSL":false,"Account":"790869068","AccountName":null,"AccountSubType":"4","AccountTotalRent":79.5,"AccountType":"I2","AmtDue":null,"AvailableCredit":null,"BillBalance":null,"BillCycle":0,"BillDate":null,"BillDateEnd":null,"CancelfoundSubscriber":[],"CommitmentOriginalMonths":0,"CreditClass":null,"LastPayment":null,"LastPaymentDate":null,"PastDueAmt":null,"PlanUpdate":false,"Status":"O","Subscribers":[{"ErrorDesc":"","ErrorNum":0,"ErrorType":"","HasError":false,"paymentid":"","AllowRenova":true,"CommitmentOriginalMonths":1,"ContarctMonth":"1","DSLQualification":null,"Divice":"","EffectiveDate":"2019-06-03T00:00:00.000-00:00","EndDate":"07/03/2019","FamilyPlan":false,"GroupId":"","ItemEffectiveDate":"2019-06-03","ItemId":"30636H","ItemPrice":null,"MasterSubscriberId":null,"PUJ_ACTION":"","PUJ_LIMIT":"20971520","PUJ_SERVICE":"","PUJ_UMLIMIT":true,"PUJ_USED":"","Plan":"Plan Local : Voz - SMSMMS en PR 20GBPUJ","PlanEffectiveDate":"06/03/2019","PlanRate":"$75","PlanUpdate":false,"ProductType":"G","ReadSubscriber":{"AccountSubType":null,"AccountType":null,"AutoTopUp":null,"Ban":null,"Category":null,"CycleCode":null,"CycleDay":null,"FirstName":null,"Groups":[],"HasError":true,"Imei":null,"IsMaster":null,"LastName":null,"Msisdn":null,"OfferGroup":null,"Offers":[],"Response":{"Description":"getSubscriber: subscriber has not been found","ResultCode":"13002"},"SubscriberId":null,"Title":null,"Type":null},"SVA":"","SVARATE":"","SVATOP":"","SVAs":[{"Description":"CeluHogar","PUJ_ACTION":"","PUJ_LIMIT":"","PUJ_SERVICE":"","PlanName":"CELUHOME1","QTY_INCLUDED":"","Rent":4.50,"RentInfo":"$4.50","SVASoc":null,"SocGroup":"CELUHOME","SocNote":null,"UOM":""}],"StartDate":"06/03/2019","SumSVAsRate":4.5,"Tech":"LTE","TotalRate":"$79.50","UpdateMonths":"0","UpdateRent":"$0","Usage":{"DLocal":"0 MB","DLocalInfo":"","DLocalTop":"0 MB","DPlanInfo":"","DPlanName":"Usted no tiene un plan de datos.","DRoam":0,"EndDate":"07/03/2019","LDIQty":"0","LDQty":"0","MinutesCount":"0","MinutesPlan":null,"Plan":"Usted no tiene un plan de datos.","RoamingQty":"0","SMSPremiumQty":"0","SMSQty":"0","StartDate":"06/03/2019","TextMessageCount":"0","Top":false,"account":790869068,"dataDate":"","iDLocal":0,"iDLocalTop":0,"subscriber":"7873180036"},"UsageOfferDataList":[],"commit_months":"0","hasSVAs":true,"hasTOPs":true,"imgDivice":"https://miclaro.clarotodo.com/ImageHandler/default_image_equipo_1.png","mSocCode":"\u0027TOLTE75L\u0027","status":"A","subscriber":"7873180036","svaSocCode":"\u0027UPDATE3\u0027,\u0027SEGUR599\u0027,\u0027SMSDONTG\u0027,\u0027UNLENHANC\u0027,\u0027DATASILI\u0027,\u0027G911\u0027,\u0027GUNSMSOC\u0027"}],"bill_url":null,"cicleDate":null,"cicleDateEnd":null,"cicleDateStart":null,"cicleDaysLeft":null,"mEmail":null,"pdf_url":null,"prodCategory":null}';
	}

	public function ValidateCreditLimit()
	{
		return '{"ErrorDesc":"","ErrorNum":0,"ErrorType":"","HasError":false,"paymentid":"","AvailableCredit":"258.93","CreditClass":"D","CreditLimit":"330","Response":true}';
	}

	public function GetOffersToSubscriber()
	{
		return '{"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}

	public function getDirectDebitInfo2()
	{
		return '{"ErrorDesc":"","ErrorNum":0,"ErrorType":"","HasError":false,"paymentid":"","Description":"Estimado Cliente: El suscriptor no ha sido encontrado en nuestra base de datos.","Offers":[],"ResultCode":"13002"}';
	}

	public function sharedCupons()
	{
		return '{"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}

	public function getBan()
	{
		return '{"Desc":"","ErrorDesc":"","HasError":false,"token":"******************************","ADSL":false,"Account":"790869080","AccountName":"maureen  gomes ","AccountSubType":"P","AccountTotalRent":110,"AccountType":"I","AmtDue":"$0.00","AvailableCredit":"($110.00)","BillBalance":"$0.00","BillCycle":4,"BillDate":"06/07/1919","BillDateEnd":"","CancelfoundSubscriber":[],"CommitmentOriginalMonths":0,"CreditClass":"H","LastPayment":"$0.00","LastPaymentDate":"","PastDueAmt":"$0.00","PlanUpdate":false,"Status":"O","Subscribers":[{"ErrorDesc":"","ErrorNum":0,"ErrorType":"","HasError":false,"paymentid":"","AllowRenova":false,"CommitmentOriginalMonths":0,"ContarctMonth":"0","DSLQualification":null,"Divice":"","EffectiveDate":"2017-11-16T00:00:00.000-00:00","EndDate":"N/A","FamilyPlan":false,"GroupId":"","ItemEffectiveDate":"2017-11-16","ItemId":"30178H","ItemPrice":null,"MasterSubscriberId":null,"PUJ_ACTION":"","PUJ_LIMIT":"","PUJ_SERVICE":"","PUJ_UMLIMIT":false,"PUJ_USED":"","Plan":"Plan Nacional : Voz local ilimitada - LD ilimitado a USA - Roaming ilimitado en USA - 100 Minutos para larga distancia a destinos internacionales - SMS/MMS en PR, a US y a ciertos destinos INT, SMS/MMS roaming en USA - Data en PR \u0026 USA de 10GB","PlanEffectiveDate":"11/16/2017","PlanRate":"$30","PlanUpdate":false,"ProductType":"G","ReadSubscriber":{"AccountSubType":null,"AccountType":null,"AutoTopUp":null,"Ban":null,"Category":null,"CycleCode":null,"CycleDay":null,"FirstName":null,"Groups":[],"HasError":true,"Imei":null,"IsMaster":null,"LastName":null,"Msisdn":null,"OfferGroup":null,"Offers":[],"Response":{"Description":null,"ResultCode":"999"},"SubscriberId":null,"Title":null,"Type":null},"SVA":"","SVARATE":"","SVATOP":"","SVAs":null,"StartDate":"N/A","SumSVAsRate":0,"Tech":"LTE","TotalRate":"$30.00","UpdateMonths":"0","UpdateRent":"$0","Usage":{"DLocal":"0 MB","DLocalInfo":"","DLocalTop":"0 MB","DPlanInfo":"","DPlanName":"Usted no tiene un plan de datos.","DRoam":0,"EndDate":"","LDIQty":"0","LDQty":"0","MinutesCount":"0","MinutesPlan":null,"Plan":"Usted no tiene un plan de datos.","RoamingQty":"0","SMSPremiumQty":"0","SMSQty":"0","StartDate":"","TextMessageCount":"0","Top":false,"account":790869080,"dataDate":"","iDLocal":0,"iDLocalTop":0,"subscriber":"9394137502"},"UsageOfferDataList":[],"commit_months":"0","hasSVAs":false,"hasTOPs":false,"imgDivice":"https://miclaro.clarotodo.com/ImageHandler/default_image_equipo_1.png","mSocCode":"\u00272230LTE\u0027","status":"A","subscriber":"9394137502","svaSocCode":"\u0027MAIL2WD\u0027,\u0027PRENHANCE\u0027"},{"ErrorDesc":"","ErrorNum":0,"ErrorType":"","HasError":false,"paymentid":"","AllowRenova":false,"CommitmentOriginalMonths":0,"ContarctMonth":"0","DSLQualification":null,"Divice":"","EffectiveDate":"2017-11-16T00:00:00.000-00:00","EndDate":"N/A","FamilyPlan":false,"GroupId":"","ItemEffectiveDate":"2017-11-16","ItemId":"30177H","ItemPrice":null,"MasterSubscriberId":null,"PUJ_ACTION":"","PUJ_LIMIT":"","PUJ_SERVICE":"","PUJ_UMLIMIT":false,"PUJ_USED":"","Plan":"Plan Nacional : Voz local ilimitada - LD ilimitado a USA - Roaming ilimitado en USA - 100 Minutos para larga distancia a destinos internacionales - SMS/MMS en PR, a US y a ciertos destinos INT, SMS/MMS roaming en USA - Data en PR \u0026 USA de 10GB","PlanEffectiveDate":"11/16/2017","PlanRate":"$30","PlanUpdate":false,"ProductType":"G","ReadSubscriber":{"AccountSubType":null,"AccountType":null,"AutoTopUp":null,"Ban":null,"Category":null,"CycleCode":null,"CycleDay":null,"FirstName":null,"Groups":[],"HasError":true,"Imei":null,"IsMaster":null,"LastName":null,"Msisdn":null,"OfferGroup":null,"Offers":[],"Response":{"Description":null,"ResultCode":"999"},"SubscriberId":null,"Title":null,"Type":null},"SVA":"","SVARATE":"","SVATOP":"","SVAs":null,"StartDate":"N/A","SumSVAsRate":0,"Tech":"LTE","TotalRate":"$30.00","UpdateMonths":"0","UpdateRent":"$0","Usage":{"DLocal":"0 MB","DLocalInfo":"","DLocalTop":"0 MB","DPlanInfo":"","DPlanName":"Usted no tiene un plan de datos.","DRoam":0,"EndDate":"","LDIQty":"0","LDQty":"0","MinutesCount":"0","MinutesPlan":null,"Plan":"Usted no tiene un plan de datos.","RoamingQty":"0","SMSPremiumQty":"0","SMSQty":"0","StartDate":"","TextMessageCount":"0","Top":false,"account":790869080,"dataDate":"","iDLocal":0,"iDLocalTop":0,"subscriber":"9394137521"},"UsageOfferDataList":[],"commit_months":"0","hasSVAs":false,"hasTOPs":false,"imgDivice":"https://miclaro.clarotodo.com/ImageHandler/default_image_equipo_1.png","mSocCode":"\u00272230LTE\u0027","status":"A","subscriber":"9394137521","svaSocCode":"\u0027MAIL2WD\u0027,\u0027PRENHANCE\u0027"},{"ErrorDesc":"","ErrorNum":0,"ErrorType":"","HasError":false,"paymentid":"","AllowRenova":false,"CommitmentOriginalMonths":0,"ContarctMonth":"0","DSLQualification":null,"Divice":"","EffectiveDate":"2017-11-16T00:00:00.000-00:00","EndDate":"N/A","FamilyPlan":false,"GroupId":"","ItemEffectiveDate":"2017-11-16","ItemId":"30346H","ItemPrice":null,"MasterSubscriberId":null,"PUJ_ACTION":"","PUJ_LIMIT":"","PUJ_SERVICE":"","PUJ_UMLIMIT":false,"PUJ_USED":"","Plan":"Plan Nacional : Voz local ilimitada - LD ilimitado a USA - Roaming ilimitado en USA - 100 Minutos para larga distancia a destinos internacionales - SMS/MMS en PR, a US y a ciertos destinos INT, SMS/MMS roaming en USA - ILIM","PlanEffectiveDate":"11/16/2017","PlanRate":"$50","PlanUpdate":false,"ProductType":"G","ReadSubscriber":{"AccountSubType":null,"AccountType":null,"AutoTopUp":null,"Ban":null,"Category":null,"CycleCode":null,"CycleDay":null,"FirstName":null,"Groups":[],"HasError":true,"Imei":null,"IsMaster":null,"LastName":null,"Msisdn":null,"OfferGroup":null,"Offers":[],"Response":{"Description":null,"ResultCode":"999"},"SubscriberId":null,"Title":null,"Type":null},"SVA":"","SVARATE":"","SVATOP":"","SVAs":null,"StartDate":"N/A","SumSVAsRate":0,"Tech":"LTE","TotalRate":"$50.00","UpdateMonths":"0","UpdateRent":"$0","Usage":{"DLocal":"0 MB","DLocalInfo":"","DLocalTop":"0 MB","DPlanInfo":"","DPlanName":"Usted no tiene un plan de datos.","DRoam":0,"EndDate":"","LDIQty":"0","LDQty":"0","MinutesCount":"0","MinutesPlan":null,"Plan":"Usted no tiene un plan de datos.","RoamingQty":"0","SMSPremiumQty":"0","SMSQty":"0","StartDate":"","TextMessageCount":"0","Top":false,"account":790869080,"dataDate":"","iDLocal":0,"iDLocalTop":0,"subscriber":"9394137554"},"UsageOfferDataList":[],"commit_months":"0","hasSVAs":false,"hasTOPs":false,"imgDivice":"https://miclaro.clarotodo.com/ImageHandler/default_image_equipo_1.png","mSocCode":"\u00272226LTE\u0027","status":"A","subscriber":"9394137554","svaSocCode":"\u0027MAIL2WD\u0027,\u0027PRENHANCE\u0027"}],"bill_url":"","cicleDate":"May 25 a Jun 24","cicleDateEnd":"06/24/2019","cicleDateStart":"05/25/2019","cicleDaysLeft":"17","mEmail":"noemail@claropr.com","pdf_url":"","prodCategory":"WLS"}';
	}

	public function RedeemCuponsByAccount()
	{
		return '{"newBalance":"0","newPrepaidBalance":"0","accountType":"","accountSubType":"","hasError":false,"errorDisplay":"Su cupón fue aplicado exitosamente","errorDesc":"Su cupón fue aplicado exitosamente","errorNum":0,"errorSubject":""}';
	}

	public function getVerifyEmail()
	{
		return '{"responseField":"ok","hasErrorField":false,"errorDescField":"","errorNumField":0,"PropertyChanged":null}';
	}

	public function getValidateReferrer()
	{
		return '{"AccountDescription":"Update","Balance":"0","Paperless":true,"registerUpdated":true,"solvent":true,"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}

	public function getSharingMediaByUser()
	{
		return '{"objItems":[{"sharingMediaID":346,"socialMediaID":1,"memberID":88,"campaignID":1,"prospects":0,"linkCode":"http://refiereygana.claroinfo.com/landing/redimir_felicidades.html?token=U60Sx%2fOALH8c8hZ1g5I35WIvfxYzkRrz7E0uPIuGH3I%3d","socialMedia":"facebook"},{"sharingMediaID":347,"socialMediaID":2,"memberID":88,"campaignID":1,"prospects":0,"linkCode":"http://refiereygana.claroinfo.com/landing/redimir_felicidades.html?token=6sYaeL6OAktcglKjO8iL0QvnPelvb4McebDiSE44EW8%3d","socialMedia":"twitter"},{"sharingMediaID":348,"socialMediaID":3,"memberID":88,"campaignID":1,"prospects":0,"linkCode":"http://refiereygana.claroinfo.com/landing/redimir_felicidades.html?token=Zt25Hz%2fg%2b0anWc0pNJ0ispVf78pzersj9fB%2bsEqdCIs%3d","socialMedia":"whatsapp"},{"sharingMediaID":349,"socialMediaID":4,"memberID":88,"campaignID":1,"prospects":0,"linkCode":"http://refiereygana.claroinfo.com/landing/redimir_felicidades.html?token=XN5Tskcy8HfTvtBQcE%2bAxFrLNjGvPNprV830iwAwGDw%3d","socialMedia":"email"},{"sharingMediaID":350,"socialMediaID":5,"memberID":88,"campaignID":1,"prospects":0,"linkCode":"http://refiereygana.claroinfo.com/landing/redimir_felicidades.html?token=l6BS7szccaYtpNBgaQbJmldw5zoVAlP78AdgHdwJUVQ%3d","socialMedia":"web"}],"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}

	public function getAcounts()
	{
		return '{"accounts":[{"account":"790869080","defaultAccount":true,"accountName":"MR. MIGUEL  RIVERA ROSADO","accountType":"I2","accountSubType":"4","registerDate":"6/6/2019 10:11:46 AM","paperless":true,"subscribers":[{"netFlixBlackListed":"false","subscriber":"7873180038","status":"A","productType":"G","defaultSubcriber":true}]}],"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}
	
	public function getMember()
	{
		return '{"campaingID":0,"memberID":88,"account":"790869080 ","accountName":"","subscriber":"7873180038","accountType":"I2","accountSubType":"4 ","productType":"G ","registerDate":"6/6/2019 10:51:33 AM","source":"web       ","dob":"01/01/1970","hobby":"Actividades al aire libre","email":"sofiagarau55@gmail.com                                                                              ","paperless":"Y ","hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}
	
	public function GetGift1GBSend()
	{
		return '{"ErrorDesc":"","ErrorNum":0,"ErrorType":"","HasError":false,"paymentid":"","Gift1GBsents":[]}';
	}

	public function getCreditsByAccount()
	{
		return '{"CreditItems":[{"account":"790869080","accountName":"MIGUEL RIVERA","memberID":88,"TotalReferer":0,"TotalAvailable":50.0,"TotalRedeem":0.0,"TotalCredits":0.0,"CountReferrs":0,"CountRedeems":0,"CountAvialable":0,"CountPending":0,"CountExpired":0}],"CreditAsReferer":{"discount":50.0,"CuponStatus":"Disponible","CuponStatusID":2,"referrID":77,"discountType":"$"},"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}

	public function getReferrAccountsAllStatus()
	{
		// return '{"objItems":[{"referrID":50,"MemberAccount":"617244500","accountName":"PABLO RODRIGUEZ","ReferrAccount":"790867113","subscriber":"9394576173","accountType":"I3","accountSubType":"P","productType":"G","discountMember":"50","discountReferr":null,"validFromDate":"06/04/2019","validUntilDate":"06/04/2020","cuponStatusID":"3","cuponStatus":"Redimido","cuponCode":"001042090000600000111","discountType":"$","MemberSubscriber":"9392564235","ReferAccountName":"JUAN DEL","refeerCuponStatusID":""}],"rowCount":1,"worPerpage":10,"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';

		return '{"objItems":[],"rowCount":0,"worPerpage":10,"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';	
	}
	
	public function gethobbies()
	{
		return '{"hobbiesList":[{"hobbie":"Actividades al aire libre","idHobbies":1},{"hobbie":"Actividades de la iglesia","idHobbies":2},{"hobbie":"Alquilar películas","idHobbies":3},{"hobbie":"Artes manuales","idHobbies":4},{"hobbie":"Bailar","idHobbies":5},{"hobbie":"Cine","idHobbies":6},{"hobbie":"Cocinar","idHobbies":7},{"hobbie":"Dibujo o pintura","idHobbies":8},{"hobbie":"Ejercicios","idHobbies":9},{"hobbie":"Escribir","idHobbies":10},{"hobbie":"Escuchar música","idHobbies":11},{"hobbie":"Ir a cenar fuera","idHobbies":12},{"hobbie":"Ir a la playa","idHobbies":13},{"hobbie":"Ir al teatro","idHobbies":14},{"hobbie":"Ir de compras","idHobbies":15},{"hobbie":"Jardinería","idHobbies":16},{"hobbie":"Lectura","idHobbies":17},{"hobbie":"Navegar por la internet","idHobbies":18},{"hobbie":"Pasear","idHobbies":19},{"hobbie":"Pesca","idHobbies":20},{"hobbie":"Practicar deportes en equipo","idHobbies":21},{"hobbie":"Practicar deportes individuales","idHobbies":22},{"hobbie":"Tocar algún instrumento","idHobbies":23},{"hobbie":"Trabajar como voluntario","idHobbies":24},{"hobbie":"Ver televisión","idHobbies":25},{"hobbie":"Viajar","idHobbies":26}],"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}
	
	public function getaccess()
	{
		return '{"Sections":[{"sectionName":"MENU","Pages":[{"userID":0,"pageName":"TUS NOTIFICACIONES","allowAsGuest":false,"accessID":1},{"userID":0,"pageName":"MI PERFIL","allowAsGuest":false,"accessID":2},{"userID":0,"pageName":"MIS  CUENTAS","allowAsGuest":false,"accessID":3},{"userID":0,"pageName":"CAMBIAR CONTRASENA","allowAsGuest":false,"accessID":4},{"userID":0,"pageName":"ACTUALIZA TU CORREO ELECTRONICO","allowAsGuest":false,"accessID":5},{"userID":0,"pageName":"PREFERENCIA DE NOTIFICACIONES","allowAsGuest":false,"accessID":6},{"userID":0,"pageName":"SOPORTE","allowAsGuest":true,"accessID":7},{"userID":0,"pageName":"CERRAR SESION","allowAsGuest":false,"accessID":8}]},{"sectionName":"FACTURA Y PAGO","Pages":[{"userID":0,"pageName":"RESUMEN DE FACTURA","allowAsGuest":true,"accessID":9},{"userID":0,"pageName":"DESCARGA TU FACTURA","allowAsGuest":false,"accessID":10},{"userID":0,"pageName":"DETALLE DE FACTURA","allowAsGuest":false,"accessID":11},{"userID":0,"pageName":"HISTORIAL DE PAGOS","allowAsGuest":false,"accessID":12},{"userID":0,"pageName":"FACTURA ELECTRONICA","allowAsGuest":false,"accessID":13},{"userID":0,"pageName":"DEBITO DIRECTO","allowAsGuest":false,"accessID":32}]},{"sectionName":"MI CONSUMO","Pages":[{"userID":0,"pageName":"DETALLE DE CONSUMOS","allowAsGuest":true,"accessID":14},{"userID":0,"pageName":"DETALLE DE LLAMADAS","allowAsGuest":true,"accessID":15}]},{"sectionName":"MIS EQUIPOS Y SERVICIOS","Pages":[{"userID":0,"pageName":"DETALLE DE TU EQUIPO Y PLAN","allowAsGuest":true,"accessID":16},{"userID":0,"pageName":"CAMBIO DE PLAN","allowAsGuest":false,"accessID":17},{"userID":0,"pageName":"NETFLIX","allowAsGuest":false,"accessID":18},{"userID":0,"pageName":"PROGRAMA DE REFERIDOS","allowAsGuest":false,"accessID":19}]},{"sectionName":"COMPRAS","Pages":[{"userID":0,"pageName":"TIENDA","allowAsGuest":false,"accessID":20},{"userID":0,"pageName":"COMPRAS","allowAsGuest":false,"accessID":38},{"userID":0,"pageName":"COMPRA DE DATA ADICIONAL","allowAsGuest":false,"accessID":21},{"userID":0,"pageName":"COMPRA DE SERVICIOS DE VALOR AGREGADO","allowAsGuest":false,"accessID":22},{"userID":0,"pageName":"HISTORIAL DE COMPRAS","allowAsGuest":false,"accessID":23},{"userID":0,"pageName":"REGALA 1GB","allowAsGuest":false,"accessID":24},{"userID":0,"pageName":"REGALA 1 RECARGA","allowAsGuest":false,"accessID":25}]}],"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""}';
	}

	public function getaccountdetails() {
		return '{"qualification":{"RedeemProgram":true,"Netflix":false,"RefererResponse":{"registerUpdated":true,"paperless":true,"solvent":true},"NetflixResponse":{"solvent":true,"Account_Status":true,"CreditLimit":false}},"Messages":{"newMessageCounter":0,"MessagesList":[],"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"errorSubject":""},"AccounInfo":{"addressLinesField":{"line1Field":null,"line2Field":null,"PropertyChanged":null},"invoicesField":[],"bANField":790869080,"dOBField":"01/01/1970","sSNField":"************","emailField":"","contractMonthsField":null,"accountTypeField":"I2","accountSubtypeField":"4","banStatusField":"O","banStatusDateField":"2019-06-03T00:00:00","billCycleField":7,"billDateField":null,"billDueDateField":"","billBalanceField":"25.88","pastDueAmountField":0.0,"lastPaymentDateField":null,"lastPaymentAmountField":0.0,"cycleStartDateField":"not_set","cycleEndDateField":"not_set","cycleDateField":"not_set","cycleDaysLeftField":"not_set","creditClassField":"D","creditBalanceField":null,"firstNameField":"MIGUEL","lastNameField":"RIVERA","addressField":"PO BOX  ","cityField":"SAN JUAN","stateField":"PR","countryField":"USA","zIPField":"00936","invoiceURLField":null,"creditInfoField":{"mUsedLimitField":null,"mCreditBalanceField":null,"mAllowedLimitField":null,"hasErrorField":false,"errorDescField":null,"errorNumField":0,"PropertyChanged":null},"paperlessField":true,"hasErrorField":false,"errorDescField":null,"errorNumField":0,"PropertyChanged":null},"SubscriberInfo":[{"equipmentInfoField":{"techField":"LTE","itemIdField":"30636H         ","itemNameField":null,"itemImageField":"https://storeorders.claropr.com/Portals/Claro/DataFiles/Products/2018-10-25T120703SAMSUNG_GALAXY_J6_BLACK_1.jpg","itemDescriptionField":"SAMSUNG GALAXY J6 BLACK","pricecodeField":"IMEICH","itemBrandField":"SAMSUNG","installmentsField":"24","installmentValueField":"8.33","PropertyChanged":null},"planInfoField":{"sOCInfoField":"TOLT40ND","sOCDescriptionField":"Plan Nacional : Voz - Mensajes - LD ilimitado a USA - Roaming - Data en PR \u0026 USA con PUJ de 10GB","sOCDescriptionInfoField":"\u003cul\u003e\u003cli\u003eVoz\u003c/li\u003e\u003cli\u003eMensajes\u003c/li\u003e\u003cli\u003eLD ilimitado a USA\u003c/li\u003e\u003cli\u003eRoaming\u003c/li\u003e\u003cli\u003eData en PR \u0026 USA con PUJ de 10GB\u003c/li\u003e\u003c/ul\u003e","relatedSocCodeField":"not_set","socRateField":40.0,"totalRateField":48.33,"commitmentStartDateField":"06/03/2019","mCommitmentOrigNoMonthField":null,"commitmentEndDateField":"06/03/2020","effectiveDateField":"06/03/2019","endDateField":null,"PropertyChanged":null},"usageInfoField":{"dataOffersField":[],"localBalanceField":"0","localTopField":"0MB","localDescriptionField":"not_set","localPUJField":"N","pUJTOPField":"0MB","roamBalanceField":"0","roamTopField":"0","minutesUsageField":"0","sMSUSageField":"0","mMSUsageField":"0","sMSPremiunUsageField":"0","roamingUsageField":"0","lDUsageField":"0","lDIUsageField":"0","notificationField":"0%","PropertyChanged":null},"additionalpackagesField":{"localPackagesField":[],"roamingPackagesField":[],"PropertyChanged":null},"servEquipmentSerialsField":{"servEquipmentSerialField":[{"itemIdField":"30636H         ","equipmentTypeField":"J","eSNField":"351961011914031","PropertyChanged":null}],"PropertyChanged":null},"servSVAInfoField":{"servSVAsField":[],"PropertyChanged":null},"netFlixBlackListedField":"false","redeemProgramField":null,"subscriberNumberField":"7873180038","productTypeField":"G","subscriberStatusField":"A","prepaidBalanceField":null,"localBalanceField":null,"reasonCodeField":null,"groupIDField":null,"hasErrorField":false,"errorDescField":null,"errorNumField":0,"PropertyChanged":null}],"HasError":false,"ErrorDesc":null,"ErrorNum":0}';
	}


	public function authenticate() {
		return '{"account":"790869080","subscriber":"7873180038","hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0,"userID":0,"roleID":0,"password":"","username":"sofiagarau55@gmail.com","email":"sofiagarau55@gmail.com","requiredAccountUpdate":false,"requiredPaperless":false,"requiredQuestions":false,"requiredEmailUpdate":false,"createdDate":"6/6/2019 10:11:46 AM","locked":false,"lastfailDate":"","failTimeCounter":0,"validCode":false,"registerUser":true,"lastLogin":"","maxDevicesCount":0,"guest":false,"accountType":"I2","accountSubType":"4","productType":"G","token":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6InNvZmlhZ2FyYXU1NUBnbWFpbC5jb20iLCJlbWFpbCI6InNvZmlhZ2FyYXU1NUBnbWFpbC5jb20iLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9tb2JpbGVwaG9uZSI6Ijc4NzMxODAwMzgiLCJuYW1laWQiOiI3OTA4NjkwODAiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9zaWQiOiIzNjEiLCJuYmYiOjE1NTk4NTg5MTYsImV4cCI6MTU1OTg2MDcxNiwiaWF0IjoxNTU5ODU4OTE2LCJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjYwMzUiLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjYwMzUifQ.w5ivkPaEKr0Xt2rxnGCixUQUxv_bmbEIh0wV1RbAmkk","requiredPasswordReset":false,"accounts":{"AccountList":[{"userID":361,"accountID":413,"registerDate":"6/6/2019 10:11:46 AM","userName":"","account":"790869080","accountType":"I2","accountSubType":"4","subsriberByDefault":"7873180038","productType":"G","active":true}],"hasError":false,"errorDisplay":"","errorDesc":"","errorNum":0}}';			
	}

}
