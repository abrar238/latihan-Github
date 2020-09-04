<?php
if($type == 'fetch'){
    $event = array();
    $query = mysqli_query($koneksi,  "SELECT*FROM event ORDER BY id");
    while($fetch=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $e = array();
        $e['id'] = $fetch['id'];
        $e['title'] = $fetch['title'];
        $e['start'] = $fetch['start'];
        $e['end'] = $fetch['end'];

        $allday = ($fetch['allDay'] == "true")? true : flase;
        $e['allday']=$allday;

        array_push($event, $e);
    }
    echo json_encode($e );
}
?>