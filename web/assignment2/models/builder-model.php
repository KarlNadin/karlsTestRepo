<?php
// Model
function getConnection(){
	try{
       $conn = new PDO('mysql:host=localhost;dbname=u1762398', 'u1762398', '29dec74');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $exception)
	{
		echo "Oh no, there was a problem" . $exception->getMessage();
	}
	return $conn;
}
function closeConnection($conn)
{
	$conn=null;
}
function getAlltradesmen()
{
	$conn = getConnection();
	$query = "SELECT * FROM tradesmen";
	$resultset = $conn->query($query);
	$tradesmen = $resultset->fetchAll();
	closeConnection($conn);
	return $tradesmen;
}
function getTradesmanById($tradesmanId)
{
	$conn = getConnection();
	$stmt = $conn->prepare("SELECT * FROM tradesmen WHERE tradesmen.id = :id");
	$stmt->bindValue(':id',$tradesmanId);
	$stmt->execute();
	$tradesman=$stmt->fetch();
	closeConnection($conn);
	return $tradesman;
}

	function getAllcustomers()
	{
		$conn = getConnection();
		$query = "SELECT * FROM customers";
		$resultset = $conn->query($query);
		$customers = $resultset->fetchAll();
		closeConnection($conn);
		return $customers;
	}
	function getCustomerById($customerId)
	{
		$conn = getConnection();
		$stmt = $conn->prepare("SELECT * FROM customers WHERE customers.id = :id");
		$stmt->bindValue(':id',$customerId);
		$stmt->execute();
		$customer=$stmt->fetch();
		closeConnection($conn);
		return $customer;
}
	// $conn = getConnection();
	// $stmt = $conn->prepare("SELECT * FROM films WHERE films.id = :id");
	// $stmt->bindValue(':id',$filmId);
	// $stmt->execute();
	// $film=$stmt->fetch();
	// closeConnection($conn);
	// return $film;

function saveTradesmen($surname, $firstName, $trade, $email, $phone){
	$conn = getConnection();
	$query="INSERT INTO tradesmen (id, surname, firstName, trade, email, phone) VALUES (NULL, :surname, :firstName, :trade, :email, :phone)";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':surname', $surname);
	$stmt->bindValue(':firstName', $firstName);
	$stmt->bindValue(':trade', $trade);
  $stmt->bindValue(':email', $email);
	$stmt->bindValue(':phone', $phone);
	$stmt->execute();
	closeConnection($conn);
}
function updateTradesman($id,$surname, $firstName, $trade, $email, $phone){
	$conn = getConnection();
	$query="UPDATE tradesmen SET surname=:surname, firstName=:firstName, trade=:trade, email=:email, phone=:phone WHERE id=:id";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':id', $id);
	$stmt->bindValue(':surname', $surname);
	$stmt->bindValue(':firstName', $firstName);
	$stmt->bindValue(':trade', $trade);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':phone', $phone);
	$stmt->execute();
	closeConnection($conn);
}
function deleteTradesman($tradesmanIds){
	$conn = getConnection();
	$stmt = $conn->prepare("DELETE FROM tradesmen WHERE tradesmen.id = :id");
	foreach($tradesmanIds as $id){
		$stmt->bindValue(':id',$id);
		$stmt->execute();
	}
	closeConnection($conn);
}



function saveCustomer($title, $surname, $firstName, $address, $email, $phone, $jobBrief){
	$conn = getConnection();
	$query="INSERT INTO customers (id, title, surname, firstName, address, email, phone, jobBrief) VALUES (NULL, :title, :surname, :firstName, :address, :email, :phone, :jobBrief)";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':title', $title);
	$stmt->bindValue(':surname', $surname);
	$stmt->bindValue(':firstName', $firstName);
	$stmt->bindValue(':address', $address);
  $stmt->bindValue(':email', $email);
	$stmt->bindValue(':phone', $phone);
	$stmt->bindvalue(':jobBrief', $jobBrief);
	$stmt->execute();
	closeConnection($conn);
}
function updateCustomer($id, $title, $surname, $firstName, $address, $email, $phone, $jobBrief){
	$conn = getConnection();
	$query="UPDATE customers SET title=:title, surname=:surname, firstName=:firstName, address=:address, email=:email, phone=:phone, jobBrief=:jobBrief WHERE id=:id";
	$stmt=$conn->prepare($query);
	$stmt->bindValue(':id', $id);
	$stmt->bindValue(':title', $title);
	$stmt->bindValue(':surname', $surname);
	$stmt->bindValue(':firstName', $firstName);
	$stmt->bindValue(':address', $address);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':phone', $phone);
	$stmt->bindvalue(':jobBrief', $jobBrief);
	$stmt->execute();
	closeConnection($conn);
}
function deleteCustomer($customerIds){
	$conn = getConnection();
	$stmt = $conn->prepare("DELETE FROM customers WHERE customers.id = :id");
	foreach($customerIds as $id){
		$stmt->bindValue(':id',$id);
		$stmt->execute();
	}
	closeConnection($conn);
}
?>
