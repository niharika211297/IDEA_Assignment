<?php
include_once("HomeController.php");

//DEFINE YOUR API on the putData function from HomeController.php. This API should be called from home.js under the JS folder.
if($_POST && isset($_POST)) {
    $stateCode = $_POST['stateCode'];
    $resultCount = $_POST['resultCount'];
    $dao = new HomeController();
    $data = array('stateCode' => $stateCode, 'resultCount' => $resultCount);
    $dao->HomeControllerConstruct($data);
    echo json_encode(array('msg' => 'Success'));
} else {
    echo json_encode(array('msg' => 'Failed'));
}

?>