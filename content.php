<?php
include 'system/koneksi.php';
?>
<script type="text/javascript">		
	$(function() {
		
		var data = [{
			label: " Nilai ",
			data: 
			[
				<?php
				$r = mysql_query("SELECT * FROM forcasting");			
	            while ($row = mysql_fetch_array($r)) { ?>
	        	[<?php echo $row['row'] ?>, <?php echo $row['c'] ?>],
	        	<?php } ?>
			]
		}, {
			label: " MA 3 ", 
			data: 
			[
				<?php
				$b = mysql_query("SELECT * FROM forcasting");			
	            while ($ow = mysql_fetch_array($b)) { ?>
	        	[<?php echo $ow['row'] ?>, <?php echo $ow['ma3'] ?>],
	        	<?php } ?>
			]
		}, {
			label: " Exponential ", 
			data: 
			[
				<?php
				$b = mysql_query("SELECT * FROM forcasting");			
	            while ($ow = mysql_fetch_array($b)) { ?>
	        	[<?php echo $ow['row'] ?>, <?php echo $ow['ft'] ?>],
	        	<?php } ?>
			]
		}, {
			label: "MA 5", 
			data: 
			[
				<?php
				$n = mysql_query("SELECT * FROM forcasting");			
	            while ($rw = mysql_fetch_array($n)) { ?>
	        	[<?php echo $rw['row'] ?>, <?php echo $rw['ma5'] ?>],
	        	<?php } ?>
			]
		}];

		var options = {
			series: {
				lines: {
					show: true
				},
				points: {
					show: true
				}
			},
			legend: {
				noColumns: 2
			},
			xaxis: {
				tickDecimals: 0
			},
			yaxis: {
				min: 0
			},
			selection: {
				mode: "x"
			}
		};

		var placeholder = $("#placeholder");

		var plot = $.plot(placeholder, data, options);

	});

	</script>
		<div class="col-lg-12">			
			<header>
				<h4><i class="icon-book"></i>  Keterangan :</h4>
			</header>
			<table class="table table-striped center">				
				<?php $abc = mysql_query("select * from forcasting");?>
				<tr>
				<?php while($ba = mysql_fetch_array($abc)) { ?>
				 	<td><?php echo "$ba[c]"; ?></td>			
				 <?php } ?>
				</tr>
				<?php $cba = mysql_query("select * from forcasting");?>
				<tr>
				<?php while($dc = mysql_fetch_array($cba)) { ?>
				 	<td>
				 		<a href="#dialog-data" id="<?php echo "$dc[row]"; ?>" class="ubah" data-toggle="modal">
				<i class="icon-pencil"></i>
			</a> <?php echo $dc['bulan'] ?>
					</td>			
				 <?php } ?>
				</tr>
				<?php $abc = mysql_query("select * from forcasting");?>
				<tr>
				<?php while($ku = mysql_fetch_array($abc)) { ?>
				 	<td>Bulan ke-<?php echo "$ku[row]"; ?></td>			
				 <?php } ?>
				</tr>
			</table>
		</div>
		<div class="">	
		<div class="col-lg-12">
		<header>
            <h4><i class="icon-tags"></i> Moving Average & Exponential Smoothing</h4>
        </header>        
        <table class="table table-striped ">
            <tr>
	            <td><strong>No</strong></td>
	            <td><strong>Bulan</strong></td>
	            <td><strong>Nilai</strong></td>
	            <td><strong>MA3</strong></td>
	            <td><strong>MA5</strong></td>
	            <td><strong>FT</strong></td>
            </tr>
	        <?php
	        for ($i = 1; $i < 9; $i++) {
	            $result = mysql_query("SELECT * FROM forcasting where row='$i' ");
	            while ($row = mysql_fetch_array($result)) {
	                $a = $row['c'];
	            }
	            $result = mysql_query("SELECT * FROM forcasting where row=$i+1 ");
	            while ($row = mysql_fetch_array($result)) {
	                $b = $row['c'];
	            }
	            $result = mysql_query("SELECT * FROM forcasting where row=$i+2 ");
	            while ($row = mysql_fetch_array($result)) {
	                $c = $row['c'];
	            }
	            $result = mysql_query("SELECT * FROM forcasting where row=$i+3 ");
	            while ($row = mysql_fetch_array($result)) {
	                $d = $row['c'];
	            }
	            $result = mysql_query("SELECT * FROM forcasting where row=$i+4 ");
	            while ($row = mysql_fetch_array($result)) {
	                $e = $row['c'];
	            }

	            $ma3 = ($a + $b + $c) / 3;
	            $ma5 = ($a + $b + $c + $d + $e ) / 5;
	            $query = "UPDATE forcasting SET ma3='$ma3' WHERE row=$i+3";
	            mysql_query($query);

	            $quer = "UPDATE forcasting SET ma5='$ma5' WHERE row=$i+5";
	            mysql_query($quer);
	        }
	        $result = mysql_query("SELECT * FROM forcasting    ");
        while ($row = mysql_fetch_array($result)) {
            $c = $row['c'];
            if ($c == null) {
                $c = 0;
            }
            $sum = 0;
            $sum = $sum + $c;
        }
        $hsum = $sum / 2;
        if ($sum <= $hsum) {
            $alpha = 0.30;
        } else if ($sum > $hsum) {
            $alpha = 0.50;
        }


        for ($i = 1; $i < 11; $i++) {
            $result = mysql_query("SELECT * FROM forcasting where row=$i   ");
            while ($row = mysql_fetch_array($result)) {

                $id = $row['row'];
                $month = $row['bulan'];
                $c = $row['c'];
                $ft = $row['ft'];

                if ($ft == null) {
                    $ft = $c;
                } else if ($ft == 0) {
                    $ft = $c;
                }
                $es = (($alpha * $c) + ((1 - $alpha) * $ft));

                $query = "UPDATE forcasting SET ft='$es' WHERE row=$i+1";
                mysql_query($query);

                $clear = "UPDATE forcasting SET ft='NULL' WHERE row='1'";
                mysql_query($clear);
            }
        }
	        $result = mysql_query("SELECT * FROM forcasting  ");
	        while ($row = mysql_fetch_array($result)) {
	            $no = $row['row'];
	            $o = $row['bulan'];
	            $p = $row['c'];
	            $q = $row['ma3'];
	            $r = $row['ma5'];
	            if ($p == null) {
	                $p = '-';
	            }
	            if ($q == null) {
	                $q = '-';
	            }
	            if ($r == null) {
	                $r = '-';
	            } 
	            $ft = $row['ft'];
                if ($ft == null) {
                    $ft ="-";
                } else if ($ft == 0) {
                    $ft ="-";
                }
                 if ($c == null) {
                    $c ="-";
                } else if ($c == 0) {
                    $c ="-";
                }

	        ?>
            <tr>
            	<td><?php echo $no 	?>	</td> 
            	<td><?php echo $o 	?>	</td> 
            	<td><?php echo $p 	?>	</td> 
            	<td><?php echo $q 	?>	</td> 
            	<td><?php echo $r 	?>	</td>
            	<td><?php echo $ft 	?>	</td>
            <tr/>
        <?php } ?>
       </table>
   </div>
   <div class="col-lg-12">
       <div class="col-lg-4">	       	
	       	<table class="table table-striped ">
	       		<?php
			 		//end MOVING AVERAGE + START 6 MONTH MOVING AVERAGE
			        $ma6 = 0;
			        $result = mysql_query("SELECT * FROM forcasting order by row desc  limit 1,6");
			        while ($row = mysql_fetch_array($result)) {
			            $c = $row['c'];
			            $ma6 = $ma6 + $c;
			        }
			        $ma6 = $ma6 / 6; 
		        ?>
	       		<tr>
	       			<td><i class="icon-random"></i>  Moving Average 6 month</td>
	       		</tr>
	       		<tr>
	       			<td> <?php echo $ma6 ?>	</td>
	       		</tr>
	       	</table>
       	</div>
       	</div>

		<div class="col-lg-6">
			<header>
            	<h4><i class="icon-filter"></i>  WMA 3 month</h4>
        	</header> 
			<table class="table table-striped ">
				<tr>
	       			<td><strong>Bulan</strong></td>
	       			<td><strong>50% oktober 33% september 17% Agustus</strong></td>
	       		</tr>
	       		<?php
		        //START WMA 3 month
		        $wmaosa=0;
		        $result = mysql_query("SELECT * FROM forcasting order by row desc limit 1,3  ");
		        while ($row = mysql_fetch_array($result)) {
		            $count1=$row['row'];
		            $c1=$row['c'];
		            $bulan1=$row['bulan'];

		           if($count1==10){
		               $bobot1=50/100;
		           } else if ($count1==9) {
		               $bobot1=33/100;
		           }else if($count1==8){
		               $bobot1=17/100;
		           }

		            $bc1=$bobot1*$c1;
		            $wmaosa1=$wmaosa+$bc1; ?>
		            <tr>
		       			<td><?php echo $bulan1 ?></td>
		       			<td><?php echo "$c1 * $bobot1 = $bc1"; ?></td>
	       			</tr>

		           <?php }
		           ?>
		           <tr>
		           	<td><strong>WMA</strong></td>
		           	<td><strong><?php echo $wmaosa1 ?></strong></td>
		           </tr>	
			</table>
		</div>
		
		<div class="col-lg-6">
			<header>
            	<h4><i class="icon-filter"></i>  WMA 3 month</h4>
        	</header> 
			<table class="table table-striped ">
				<tr>
	       			<td><strong>Bulan</strong></td>
	       			<td><strong>50% Agustus 33% september 17% Oktober</strong></td>
	       		</tr>
	       		<?php
		        //START WMA 3 month
		        $wmaaso=0;
		        $result = mysql_query("SELECT * FROM forcasting order by row desc limit 1,3  ");
		        while ($row = mysql_fetch_array($result)) {
		            $count=$row['row'];
		            $c=$row['c'];
		            $bulan=$row['bulan'];

		           if($count==8){
		               $bobot=50/100;
		           } else if ($count==9) {
		               $bobot=33/100;
		           }else if($count==10){
		               $bobot=17/100;
		           }

		            $bc=$bobot*$c;
		            $wmaaso=$wmaaso+$bc; ?>
		            <tr>
		       			<td><?php echo $bulan ?></td>
		       			<td><?php echo "$c * $bobot = $bc"; ?></td>
	       			</tr>

		           <?php }
		           ?>
		           <tr>
		           	<td><strong>WMA</strong></td>
		           	<td><strong><?php echo $wmaaso ?></strong></td>
		           </tr>	
			</table>
		</div>

		<div class="col-lg-12">
			<header>
            	<h4><i class="icon-random"></i>  Hasil</h4>
        	</header> 
			<table class="table table-striped center">
				<tr>
	               <td>6 month MA</td>
	               <td>3 month WMA<br/>50% oktober 33% september 17% Agustus</td>
	               <td>3 month WMA <br/>50% Agustus 33% september 17% Oktober</td>
               	</tr>
               	<tr>
               <td><?php echo $ma6 ?></td>
               <td><?php echo $wmaosa1 ?></td>
               <td><?php echo $wmaaso ?></td>
               </tr>
			</table>
		</div>
	</div>