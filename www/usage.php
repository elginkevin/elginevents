<?php
	//Include the PS_Encrypt class
	include('ps_encrypt.php');

	/*
	* Create a PS_Encrypt object
	*
	*/
	$encrypt = new PS_Encrypt();

	/*
	* Set encryption key
	*/
	$encrypt->setKey('q%6WXdXnv&amp;%g');

	/*
	* Encrypt data
	*/
	$encrypted_data = $encrypt->encrypt('secret_password');

	/*
	* Descrypt data
	*
	*/
	$decrypted_data = $encrypt->descrypt($encrypted_data);
	echo $decrypted_data; //Will output "secret_password"
?>