<?php 


class ElectricBill {

	public $total = 0;
	public $units;
	private $prices = [3.5, 4, 5.2, 6.5];
	private $milestones = [50, 100, 100, 250];

	public function __construct($units){
		$this->units = $units;
	}

	private function cost($units, $priceId) {
		$this->units -= $units;
		return ($units*$this->prices[$priceId]);
	}

	public function compute() {

		foreach($this->milestones as $key => $milestone){

			if($this->units == 0) break; //Stop loop when unit is 0

			$isMoreThanMilestone = ($this->units >= $milestone);

				if($milestone == 250) //Check for last milestone
					$this->total += $this->cost($isMoreThanMilestone ? $this->units : $milestone, $key);
				else
					$this->total += $this->cost($isMoreThanMilestone ? $milestone : $this->units, $key); 

		}

			return $this->total;
	}

}

$obj = new ElectricBill(1000);
echo $obj->compute();

 ?>