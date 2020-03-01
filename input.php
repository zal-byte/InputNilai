<?php

	$connect = mysqli_connect("localhost","database","root","nilai");

	if(!$connect){
	$re = array();
	$re["connection"] = array();

	$rep["status"] = "error";
	$rep["response"] = $connect;

	array_push($re["connection"],$rep);
	echo json_encode($re);
}else{


	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$con = mysqli_connect("localhost","database","root","nilai");
		
		$nama = $_POST["nama"];
		$keterampilan = $_POST["keterampilan"];
		$pengetahuan = $_POST["pengetahuan"];
		$nilai = $_POST["nilai"];

		$query = "insert into x_rpl_b (`nama`,`keterampilan`,`pengetahuan`,`nilai`) values ('$nama','$keterampilan','$pengetahuan','$nilai')";
		$sql = mysqli_query($con, $query);
		$re = array();
		$re["response"] = array();
		if(!$sql){
			$res["status"] = "error";
			$res["response"] = "Something went wrong with SQL";
			array_push($re["response"],$res);
			echo json_encode($re);
			mysqli_close($con);
		}else{
			$res["status"] = "success";
			$res["response"] = "Data has been uploaded";
			array_push($re["response"],$res);
			echo json_encode($re);

			mysqli_close($con);
		}



	}else{

	}

}
?>