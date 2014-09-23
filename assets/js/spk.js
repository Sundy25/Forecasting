(function($) {
	$(document).ready(function(e) {
		
		var row = 0;
		var main = "content.php";

		$("#data-nilai").load(main);
		
		// ketika tombol ubah/tambah di tekan
		$('.ubah').live("click", function(){
			
			var url = "form.php";
			row = this.id;
			
			$("#myModalLabel").html("Ubah Nilai Data");
			
			$.post(url, {id: row} ,function(data) {
				$(".modal-body").html(data).show();
			});
		});
		
		
		$("#simpan-data").bind("click", function(event) {
			var url = "action.php";

			var v_bulan = $('input:text[name=bulan]').val();
			var v_nilai = $('input:text[name=nilai]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {bulan: v_bulan, nilai: v_nilai, id: row} ,function() {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-nilai"></div>
				$("#data-nilai").load(main);

				// sembunyikan modal dialog
				$('#dialog-data').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Mahasiswa");
			});
		});
	});
}) (jQuery);
