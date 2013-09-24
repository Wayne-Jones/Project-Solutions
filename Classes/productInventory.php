<?php
	class Product{
		
		private $price;
		private $id;
		private $quantity;
		
		public function __construct($price, $id, $quantity){
			$this->price = $price;
			$this->id = $id;
			$this->quantity = $quantity;
		}
		
		public function getQuantity(){
			return $this->quantity;
		}
		public function getID(){
			return $this->id;
		}
		public function getPrice(){
			return $this->price;
		}
		public function setQuantity($newQuantity){
			$this->quantity = $newQuantity;
		}
		public function setPrice($newPrice){
			$this->price = $newPrice;
		}
	}
	
	class Inventory{
		
		private $inventoryValue;
		public $productArr = array();
		
		public function __construct(){
			$inventoryValue = 0;
		}
		
		public function addToInventory(Product $newProduct){
			array_push($this->productArr, $newProduct);
		}
		
		private function calcValue(){
			foreach ($this->productArr as $product){
				$price = $product->getPrice();
				$quantity = $product->getQuantity();
				$this->inventoryValue += $price * $quantity;
			}
		}
		public function getValue(){
			$this->calcValue();
			return $this->inventoryValue;
		}
	}
?>

<html>
<body>
<?php
	$milk = new Product(3.15, 1000, 50);
	$soda = new Product(2.00, 1010, 25);
	$cereal = new Product(4.30, 1020, 30);
	$inventory = new Inventory();
	$inventory->addToInventory($milk);
	$inventory->addToInventory($soda);
	$inventory->addToInventory($cereal);
?>
<h2>Value of the Inventory</h2>
<?php
	echo $inventory->getValue();
?>
</bddy>
</html>