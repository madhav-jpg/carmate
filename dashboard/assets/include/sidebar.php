<?php 

?>
<div class="col-xl-3 col-lg-12 col-md-12"> 

<div class="card"> 

<div class="card-header"> <h3 class="card-title">Dashboard</h3> 
</div> 

<div class="card-body text-center item-user border-bottom"> 

<div class="profile-pic"> 
<h4 class="mt-3 mb-0 font-weight-semibold" style="text-align: left;">Hello,</h4>
<h4 class="mt-3 mb-0 font-weight-semibold" style="text-align: left;"><?php echo $data['f_name']; ?></h4>
</div> 
</div> 

<div class="item1-links  mb-0"> 
<?php
		$i=0;
		while($i<count($list)) 
		{
				echo "<a href='".$list[$i][0]."' class='";
				if($curPageName==$list[$i][0])
					echo "active ";
				echo "d-flex border-bottom'> 
						<span class='icon1 mr-3'><h4><i class='".$list[$i][1]."'></i></h4>
						</span>".$list[$i][2]."</a>";
			$i++;
		}
?>


</div> 
</div> 

</div> 