<?php
	require_once 'config.php';
 class Students
	{
		public function AddStudent($data){
			$roll = $data['roll'];
			$name = $data['name'];
			if($roll=="" || $name==""){
				return $msg = "<div class='alert alert-danger'><strong>Error : </strong>Field must not be empty..</div>";
			}
			$return = Students::CheckID($roll);
			if($return){
				return $msg = "<div class='alert alert-danger'><strong>Error : </strong>This roll number already exists..</div>";
			}else{
				$sql = "INSERT INTO students(roll,name)VALUES(:roll,:name)";
				$query = DB::prepare($sql);
				$query->bindValue(':roll',$roll);
				$query->bindValue(':name',$name);
				$return = $query->execute();
				$sql = "INSERT INTO attend(roll)VALUES(:roll)";
				$query = DB::prepare($sql);
				$query->bindValue(':roll',$roll);
				$return = $query->execute();
				if($return){
					return $msg = "<div class='alert alert-success'><strong>Success : </strong>New student data inserted successfully..</div>";
				}
			}
		}
		public static function CheckID($roll){
			$sql = "SELECT * FROM students WHERE roll=:roll";
			$query = DB::prepare($sql);
			$query->bindValue(':roll',$roll);
			$query->execute();
			if($query->rowCount()>0){
				return true;
			}
			else{
				return false;
			}
		}
		public static function ReadAll(){
			$sql = "SELECT * FROM students";
			$query = DB::prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
		public function insertAttend($attend = array()){
			$cur_dt = date('Y-m-d');
			$sql = "SELECT attend_date FROM attend WHERE attend_date=:attend_date";
			$query = DB::prepare($sql);
			$query->bindValue(':attend_date',$cur_dt);
			$query->execute();
			if($query->rowCount()>0){
					return $msg = "<div class='alert alert-danger'><strong>Error : </strong>Today Attendance already taken...</div>";			
			}
			foreach ($attend as $attn_key => $attn_value) 
			{
				if($attn_value=='present'){
					$sql = "INSERT INTO attend(roll,attend,attend_date)VALUES(:roll,:attend,:attend_date)";
					$query = DB::prepare($sql);
					$query->bindValue(':roll',$attn_key);
					$query->bindValue(':attend','present');
					$query->bindValue(':attend_date',$cur_dt);
					$attninsert = $query->execute();


				}
				else if($attn_value=='absent'){
					$sql = "INSERT INTO attend(roll,attend,attend_date)VALUES(:roll,:attend,:attend_date)";
					$query = DB::prepare($sql);
					$query->bindValue(':roll',$attn_key);
					$query->bindValue(':attend','absent');
					$query->bindValue(':attend_date',$cur_dt);
					$attninsert = $query->execute();

				
			}
		}
			if($attninsert){
				return $msg = "<div class='alert alert-success'><strong>Success : </strong>Today Attendance data inserted successfully...</div>";
			}
			else{
				return $msg = "<div class='alert alert-danger'><strong>Error : </strong>Attendance data not inserted...</div>";
			}

		}
		public function getDateList(){
			$sql = "SELECT DISTINCT(attend_date) FROM attend";
			$query = DB::prepare($sql);
			$query->execute();
			return $query->fetchAll();
			}
		public function ReadByDate($dt){
			$sql = "SELECT * FROM attend WHERE attend_date=:attend_date";
			$query = DB::prepare($sql);
			$query->bindValue(':attend_date',$dt);
			$query->execute();
			return $query->fetchAll();
			}
		public function updateAttend($dt,$attend=array()){
				foreach($attend as $atn_key => $atn_value) {
				if($atn_value=='present'){
					$sql = "UPDATE attend SET attend=:attend WHERE roll=:roll AND attend_date=:attend_date";
					$query = DB::prepare($sql);
					$query->bindValue(':attend','present');
					$query->bindValue(':roll',$atn_key);
					$query->bindValue(':attend_date',$dt);
					return $updated = $query->execute();
				}
				else if($atn_value=='absent'){
					$sql = "UPDATE attend SET attend=:attend WHERE roll=:roll AND attend_date=:attend_date";
					$query = DB::prepare($sql);
					$query->bindValue(':attend','absent');
					$query->bindValue(':roll',$atn_key);
					$query->bindValue(':attend_date',$dt);
					return $updated = $query->execute();					
				}

			}
			if($updated){
				return $msg = "<div class='alert alert-success'><strong>Success : </strong>Attendance data updated successfully...</div>";
			}
			else{
				return $msg = "<div class='alert alert-danger'><strong>Error : </strong>Attendance data not updated...</div>";
			}
			
			}
	}
?>

						
					