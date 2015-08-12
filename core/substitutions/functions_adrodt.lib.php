<?php
/** 		Function called to complete substitution array (before generating on ODT, or a personalized email)
 * 		functions xxx_completesubstitutionarray are called by make_substitutions() if file
 * 		is inside directory htdocs/core/substitutions
 * 
 *		@param	array		$substitutionarray	Array with substitution key=>val
 *		@param	Translate	$langs			Output langs
 *		@param	Object		$object			Object to use to get values
 * 		@return	void					The entry parameter $substitutionarray is modified
 */
function adrodt_completesubstitutionarray(&$substitutionarray,$langs,$object)
{
   global $conf,$db;
 
   	$arrayidcontact = $object->getIdContact('external','CUSTOMER');
	if (count($arrayidcontact) > 0 && $object->fetch_contact($arrayidcontact[0]) == true)
	{
		$substitutionarray['adrodt_deliv_name']		 	= $object->client->name;
		$substitutionarray['adrodt_deliv_lastname'] 	= $object->contact->lastname;
		$substitutionarray['adrodt_deliv_firstname'] 	= $object->contact->firstname;
		$substitutionarray['adrodt_deliv_address'] 		= $object->contact->address;
		$substitutionarray['adrodt_deliv_zip'] 			= $object->contact->zip;
		$substitutionarray['adrodt_deliv_town'] 		= $object->contact->town;
		$substitutionarray['adrodt_deliv_department'] 	= $object->contact->department;
		$substitutionarray['adrodt_deliv_state'] 		= $object->contact->state;
		$substitutionarray['adrodt_deliv_country'] 		= $object->contact->country;
		$substitutionarray['adrodt_deliv_email'] 		= $object->contact->email;
		$substitutionarray['adrodt_deliv_phone'] 		= $object->contact->phone_pro;
		$substitutionarray['adrodt_deliv_fax'] 			= $object->contact->fax;
	}
	else
	{
		$substitutionarray['adrodt_deliv_name']		 	= $object->client->name;
		$substitutionarray['adrodt_deliv_lastname'] 	= $object->client->lastname;
		$substitutionarray['adrodt_deliv_firstname'] 	= $object->client->firstname;
		$substitutionarray['adrodt_deliv_address'] 		= $object->client->address;
		$substitutionarray['adrodt_deliv_zip'] 			= $object->client->zip;
		$substitutionarray['adrodt_deliv_town'] 		= $object->client->town;
		$substitutionarray['adrodt_deliv_department'] 	= $object->client->department;
		$substitutionarray['adrodt_deliv_state'] 		= $object->client->state;
		$substitutionarray['adrodt_deliv_country'] 		= $object->client->country;
		$substitutionarray['adrodt_deliv_email'] 		= $object->client->email;
		$substitutionarray['adrodt_deliv_phone'] 		= $object->client->phone;
		$substitutionarray['adrodt_deliv_fax'] 			= $object->client->fax;
	}
	
	$substitutionarray['myowntag'].=''.print_r($substitutionarray, true);
	$substitutionarray['myowntag'].='-------------------'.print_r($object, true);
   
}