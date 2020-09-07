<script type="text/javascript">
	$('#calendar').fullCalendar({
		eventClick:function(event, element){
			event.title="CLICKED!";
			$('#calendar').fullCalendar('update event');
		}
	});
</script>
<?php 

$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sql = "UPDATE event SET title='".$title."', start='".$start."', end='".$end."' WHERE id=".$id;
mysqli_query($koneksi, $sql)
mysqli_close($koneksi);

 ?>