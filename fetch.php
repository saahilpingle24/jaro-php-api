<?php
 session_start();
require_once __DIR__ . '/vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Kms\KmsClient;

$s3_client = S3Client::factory(array(
	'version' => 'latest',
	'region' => 'us-east-1',
	'credentials' => array(
	'key'    => '',
	'secret' => ''
	))
);

$kms_client = KmsClient::factory(array(
'version' => 'latest',
'region' => 'us-east-1',
'credentials' => array(
'key'    => '',
'secret' => ''
))
);

$username = $s3_client->getObject(array(
'Bucket' => 'cloudproject2final',
'Key'    => 'db_username.txt',
));

$password = $s3_client->getObject(array(
'Bucket' => 'cloudproject2final',
'Key'    => 'db_password.txt',
));

$endpoint = $s3_client->getObject(array(
'Bucket' => 'cloudproject2final',
'Key'    => 'db_endpoint.txt',
));

$_SESSION['username'] = $kms_client->decrypt(array('CiphertextBlob' => $username['Body']))["Plaintext"];
$_SESSION['password'] = $kms_client->decrypt(array('CiphertextBlob' => $password['Body']))["Plaintext"];
$_SESSION['endpoint'] = $kms_client->decrypt(array('CiphertextBlob' => $endpoint['Body']))["Plaintext"];	

?>
