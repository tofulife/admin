<?php 

	class page{
		private $pagesize;
		private $pagecount;
		private $total;
		private $nowpage;
		private $type;
		private $arr=array();
		public function __construct($pagesize,$nowpage,$type){
			$this->pagesize=$pagesize;
			$this->nowpage=$nowpage;
			$this->type=$type;
		}
		public function showTotal(){
			echo $this->total;
		}
		public function showInfo(){
			require_once('../config.php');
			if($this->nowpage==""||!isset($this->nowpage)){
				$this->nowpage=1;
			}
			$offset=($this->nowpage-1)*$this->pagesize;
			$sql="select * from $this->type limit $offset ,$this->pagesize";
			$result=$pdo->query($sql);
			if($result){
				while($row=$result->fetch(PDO::FETCH_ASSOC))
					$this->arr[]=$row;
			}

			return($this->arr);
		}
		public function toPage(){
			require('../config.php');
			$sql="select *from $this->type ";
			$result=$pdo->query($sql);
			$row=$result->fetchAll();
			$this->total=count($row);
			if($this->total%$this->pagesize==0){
			$this->pagecount=$this->total/$this->pagesize;
			}
			else{
				if($this->total<=$this->pagesize){
					$this->pagecount=1;
				}
				else{
				$this->pagecount=ceil($this->total/$this->pagesize);
				}
			}
		}
		public function showNowpage(){
			return  $this->nowpage;
		}
		public function showPagecount(){
			return $this->pagecount;
		}
	}
 ?>