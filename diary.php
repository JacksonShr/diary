<?php 

require_once "db.php";





class year extends db_connection {
	
	
	function __construct() {
		
		parent::__construct();
		
		}
	
	
	}



class day extends year {
	
	function __construct() {
		
		parent::__construct();
		
		require_once "options/interface.php";
		
		require_once "../auth.php";
		
		$this->header = HEADER;
		$this->footer = FOOTER;
		
		
		
		}
	
	
	function __destruct() {
		
		//echo $this->footer;		
		
		}
	 
	
	function show_day() {
		
		$this->day = date("U");
		
		if ( isset($_POST['day'] ) ) {
			
			$this->day = strtotime($_POST['day']);
			
		} else {
			
			$this->day = date("U");
			//$_['day'];
			
		}
		
		$_SESSION['day'] = date("Y-m-d", $this->day);
		
		 
		
		$previous_day = date("Y-m-d", ($this->day - 86400) );
		$next_day = date("Y-m-d", ($this->day + 86400) );
		
		$day_str = "<form method=post ><input type=submit name=day value=" 
		. $previous_day 
		. " />".$_SESSION['day'] . "<input type=submit name=day value=" 
		. $next_day 
		. " /></form>";
		
		echo $day_str;
		
		
		
		//var_dump($this->day);
		//var_dump($_POST);
		//var_dump($_SESSION);
		echo "<h3>Objectives</h3>";
		
		$objective = new objective();
		$objective->update();
		$objective->insert();
		$objective->delete();
		$objective->show_note();
		
		
		echo "<h3>Events</h3>";
		
		$event = new event();
		$event->update();
		$event->insert();
		$event->delete();
		$event->show_note();
		
	}
	
	
	
	}

	
	
	abstract class note extends day  {
		
		var $title, $desc;
		var $time;
		var $table = "NOTES";
		
		var $condition = "";
		
		
		
		function __construct ($table) {
			
			parent::__construct();
			
			$this->table = $table . "_" . $_SESSION['wcp_login'];
			
			}
		
		
		function add_note() {
			
			foreach ($id as $key => $value ) {
			
				parent::insert();
			
				}
			
			}
		
		
		
		function change_note() {
			
			foreach ($id as $key => $value ) {
			
				parent::update();
			
				}//end of foreach
			
			
			}
		
		
		
		function delete_note($id) {
		
		
		foreach ($id as $key => $value ) {
			
			$condition = $condition . "id='".$value . "'";
			parent::delete();
			
			}//end of foreach
		
		
		}
		
		
		
		function show_note(  ) {
			
			$output_string = "<form method=post ><input type=hidden name=table value=" 
			. $this->table 
			. " />";
			
			$condition = " date='" . $_SESSION['day'] . "' ORDER BY time";
			
			
			if ( isset( $_POST['page'] ) ) {
				
				$prev_page = $_POST['page'];
				$next_page = $prev_page + 20;
				
			} else {
				
				$prev_page = 0;
				$next_page = 50;
				
			}
			
			
			
			$arr = parent::query($this->table, "id, date, time, name, description ", $condition, $prev_page, $next_page)->fetchAll();
			
			$length = count($arr);
			
			//var_dump($arr);
			
			
			if ( $length == 0 ) {
					
					$condition = "id='1'";
					
					$arr = parent::query($this->table, "id, date, time, name, description ", $condition, $prev_page, $next_page)->fetchAll();
			
					}
			
			//var_dump($arr);
			
			
			
			
			
		
			for ($i = 0; $i < $length; $i++ ) {
				
				$output_string = $output_string 
				. "<div class='row'  id='row"  
				. $i 
				."' >";
				
				
				
		
		
				$output_string = $output_string . "<input type=checkbox name='id[" 
		. $arr[$i]['id'] 
		. "]' value=1 />";
		
				//var_dump($arr);
				
				foreach ($arr[$i] as $key => $value ) {
				
				switch ($key) {
					
					case "date": 
					$value = "<input type='date' name='update_array["
					. $key 
					. "]'  value=" 
					. $value 
					. " />";
					break;
					
					case "time": 
					
					
					$value = "<input type='time' name='update_array["
					. $key 
					. "]' placeholder=new_time value='" 
					. $value 
					. "' />";
					break;
					
					case "id":
					continue;
					break;
					
					case "description": 
					$value = "<textarea name='update_array["
					. $arr[$i]['id'] 
					. "]["
					. $key 
					. "]' cols=40 rows=10>"
					. $value 
					. "</textarea>";
					break;
					
					
					
					default: 
					$value = "<input type='text' name='update_array["
					. $arr[$i]['id'] 
					. "]["
					. $key 
					. "]' value='" 
					.$value 
					."' />";
				}
				
				
					
				
				
				$output_string = $output_string 
				. "<div class="
				. $key 
				. " id="
				. $key 
				. $i 
				. " class=" 
				. $key 
				. ">" 
				. $value  
				. "</div>";
				
					}//foreach ends
				
				$output_string = $output_string 
				. "<hr /></div><!--end of row-->";
				
				
				
				}//for ends
				
				
				
				$output_string = $output_string 
				. "<hr /><hr /><div class='row' id='new_row' >";
				
				//var_dump($arr);
				
				foreach ($arr[0]  as $key => $value ) {
				
				
				
				switch ($key) {
					
					case "date": 
					$value = "<input type='date' name='insert_array["
					. $key 
					. "]'  value=" 
					. $_SESSION['day'] 
					. " />";
					break;
					
					case "time": 
					
					//if ( $value == 0) $value = date("H:i");
					
					
					$value = "<input type='time' name='insert_array["
					. $key 
					. "]' placeholder=new_time value='"
					.date("H:i") 
					. "' />";
					break;
					case "id":
					continue;
					break;
					
					case "description": 
					$value = "<textarea name=insert_array["
					. $key 
					. "]  cols=40 rows=10 placeholder=new_note ></textarea>";
					break;
					
					
					
					default: 
					$value = "<input type='text' name='insert_array["
					. $key 
					. "]' placeholder=new value='' />";
					
					
					
				}
					
					
				
				$output_string = $output_string 
				. "<div id="
				. $key 
				. $i 
				. " class=" 
				. $key 
				. ">" 
				. $value  
				. "</div>";
				
					}//foreach ends
				
				$output_string = $output_string 
				. "</div><!--end of new_row-->";
				
				$output_string = $output_string . "
	<input type=submit name=update_array_submit value=update />
	<input type=submit name=insert_array_submit value=insert />
	<input type=submit name=delete_array_submit value=delete />
	
	</form>";
				
				echo $output_string;
			
			}
		
		
		
		function bind() {}
		
		} 
	
	
	
	class objective extends note {
		
		var $status;
		
		
		function __construct () {
			
			
			parent::__construct("OBJECTIVES");
			
			}
		
		}
	
	
	
	class event extends note {
		
		
		
		function __construct () {
			
			
			parent::__construct("EVENTS");
			
			}
				
		
		}
		
		
		
		
		$day = new day();
		
		$auth = new authentification();
		
		echo $day->header;
		
		$auth->auth();
		
		$day->show_day();
		
		echo FOOTER;
		/*
		var_dump($_POST);
		echo "<hr />";
		var_dump($_SESSION);
		echo "<hr />";
		var_dump($_COOKIE);*/
		
		
	
?>











