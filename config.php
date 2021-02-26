  <?php 
	class DB{
		public static $pdo;
		public static function Connection(){
		if(!isset(self::$pdo)){
			try{
				$dsn = "mysql:dbname=stas;host=localhost;";
				$user = "root";
				$pass = "";
				self::$pdo = new PDO($dsn,$user,$pass);
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
			
		}
		return self::$pdo;
		}
		public static function prepare($sql)
		{
			return self::Connection()->prepare($sql);
		}
	}
	
 ?>
 