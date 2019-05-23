<?php
use Aws\S3\S3Client;
             $file_name = basename($_FILES['image']['name']);
                $temp_file_location = $_FILES['image']['tmp_name'];
		//url de conde se cargan las imagenes en el bucket
               $path = 'https://s3.amazonaws.com/nombredetubucket/' . $file_name;
                require __DIR__.'/vendor/autoload.php';
              $ext = pathinfo($path, PATHINFO_EXTENSION);
$conf = [
    'credentials' => ['key' => 'corta', 'secret' => 'larga'],
    'region'      => 'us-east-2',
    'version'     => 'latest'
];
$s3 = new Aws\S3\S3Client($conf);
                $result = $s3->putObject([
                        'Bucket' => 'nombredetubucket',
                        'Key'    => $file_name,
                        'SourceFile' => $temp_file_location,
                        'ContentType' => 'image/'.$ext,
                        'ACL'    => 'public-read',
                        'MetadataDirective' => 'REPLACE'
                ]);
                   	$imagencargada = $path;
                       echo "cargo la imagen" . $imagencargada;
                        //var_dump($result);
//}
//Listing all S3 Bucket
//$buckets = $s3->listBuckets();
//foreach ($buckets['Buckets'] as $bucket) {
  //  echo $bucket['Name'] . "\n";
//}

//echo "hola" . "\n";
//if(isset($_POST["submit"])){
//echo basename($_FILES["image"]["name"]);
//echo $file_name . "\n";
//echo $temp_file_location;
//echo $path;
//echo $ext;
//;}
?>

