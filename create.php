<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../iot_web/database.php';
    include_once '../iot_web/nodemcu_log.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Nodemcu_log($db);

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// The request is using the POST method
		$data = json_decode(file_get_contents("php://input"));
		$item->pH = $data->pH;
		$item->temp = $data->temp;
    $item->gas = $data->gas;
		$item->psi = $data->psi;
    $item->pa = $data->pa;

	}
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
		// The request is using the GET method
		$item->pH = isset($_GET['pH']) ? $_GET['pH'] : die('wrong structure!');
		$item->temp = isset($_GET['temp']) ? $_GET['temp'] : die('wrong structure!');
    $item->gas = isset($_GET['gas']) ? $_GET['gas'] : die('wrong structure!');
		$item->psi = isset($_GET['psi']) ? $_GET['psi'] : die('wrong structure!');
    $item->pa = isset($_GET['pa']) ? $_GET['pa'] : die('wrong structure!');

	}else {
		die('wrong request method');
	}

    if($item->createLogData()){
        echo 'Data created successfully.';
    } else{
        echo 'Data could not be created.';
    }
?>
