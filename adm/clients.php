
<?php
include 'adm-head.php';
include_once'../Includes/connection.php'; 
$each_page = 8;

$sql = "SELECT  id, name, email, message, service, clock, Cliente_IP FROM mjcode_Contact";

$response = mysqli_query($connect, $sql);

$number_of_result = mysqli_num_rows($response);
$page_total = ceil($number_of_result / $each_page);

if(!isset($_GET['page'])){
  $i = 1;
}else{
  $i = $_GET['page'];
}
$first_page = ($i - 1) * $each_page;

if(isset($_GET['order']) && isset($_GET['sort'])){
  $ORDER = "ORDER BY {$_GET['order']} {$_GET['sort']}";
}
else{
  $ORDER = "ORDER BY id ASC";
}
$sql = "SELECT  id, name, email, message, service, clock, Cliente_IP FROM mjcode_Contact ".$ORDER." LIMIT " .$first_page. ','.$each_page;

$res = mysqli_query($connect, $sql);
 ?>

				 <div class="row">
					<div class="col-sm-12 push-m3" >
						  <h2 class="text-center" id="clients">Clients</h2>
						 
						  <table class="table table-striped">
							    <thead>
							      <tr style="font-size: 17px;font-family: 'Shadows Into Light', cursive;text-transform: uppercase;" class="text-center">
							      	 <th scope="col">ID<a href="?order=id&sort=asc">&and;</a><a href="?order=id&sort=desc">&or;</a></th>
			    <th scope="col">NAME<a href="?order=name&sort=asc">&and;</a><a href="?order=name&sort=desc">&or;</a></th>
			    <th scope="col">EMAIL<a href="?order=email&sort=asc">&and;</a><a href="?order=email&sort=desc">&or;</a></th>
			    <th scope="col">SERVICE<a href="?order=service&sort=asc">&and;</a><a href="?order=service&sort=desc">&or;</a></th>
			     <th scope="col">MESSAGE<a href="?order=message&sort=asc">&and;</a><a href="?order=message&sort=desc">&or;</a></th>
			     <th scope="col">DATE<a href="?order=clock&sort=asc">&and;</a><a href="?order=clock&sort=desc">&or;</a></th>
			     <th scope="col">IP<a href="?order=CLiente_IP&sort=asc">&and;</a><a href="?order=CLiente_IP&sort=desc">&or;</a></th>
			    <th scope="col">OPTION</th>
							      </tr>
							    </thead><br>
							    	<tbody>
        <?php if( mysqli_num_rows($res) == 0){
				?>
				<tr>
					<td colspan="8">
                <div class="alert alert-info" align="center">
                    There is no Contact
              </div>
        </td>
				</tr>
				<?php	
		  	}else
             while($value = mysqli_fetch_array($res)) {
             $service = $value['service'];
              if ($service=='W') {
                  $service = 'Web';
                }
                else if ($service=='M') {
                  $service = 'Mobile';
                }
                else{
                  $service = 'Web And Mobile';
                } 
                $date = $value['clock'];
            ?>
            <tr>
              <td><?= $value['id']?></td>
              <td><?= $value['name']?></td>
              <td><?= $value['email']?></td>
              <td><?= $service ?></td>
              <td><?= $value['message']?></td>
              <td><?= date('d/m/Y H:i:s', strtotime($date))?></td>
              <td><?= $value['Cliente_IP']?></td>
              <td>
                <a href="remove.php?id=<?=$value['id']?>"><button type="button" class="btn btn-danger"  onclick="return deleteConfirm()">Delete</button></a>
              </td>
            </tr>
          <?php }?>
        </tbody>

							</table>
							 <ul class="pagination" id="pagination">
      <?php
          for($i = 1; $i<= $page_total; $i++){
           echo '<li class="page-item"><a class="page-link" href="clients.php?page=' .$i. '">' .$i. '</a></li>';
          }
      ?>  
      </ul> 	

					</div>	
				</div>
			</div>
		</div>
	</div>
<?php
	include_once 'footer.php';
?>
