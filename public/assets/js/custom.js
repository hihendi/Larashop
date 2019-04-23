 
 
        $('.sweetalert_delete').on('click', function(e){
            e.preventDefault();
            var formid = $(this).attr('data-formid');
  //          swal({
  // title: "Are you sure?",
  //               text: "Klik Hapus untuk menghapus data !",
  //               icon: 'warning',
  //               buttons: true,
  //               dangerMode: true,
  //               // showCancelButton: true,
  //               // confirmButtonColor: "#3085d6",
  //               // cancelButtonColor: "#d33",
  //               // confirmButtonText: 'Hapus'
  //           })
  //           .then(willDelete) => {
  //               if(willDelete){
  //                   $("#"+formid).submit();
  //               	swal("Berhasil! Data berhasil dihapus!", {
  //     					icon: "success",
  //  					 });
  //               }

  //               else {
  //               	swal("Data aman, tidak terhapus!");
  //               }
  //           };

        swal({
 				 title: "Apa Kamu yakin ingin menghapus data?",
  				 text: "Klik Hapus untuk menghapus data !",
  				 icon: "warning",
  				 buttons: true,
  				 dangerMode: true,
			})
			.then((willDelete) => {
  				if (willDelete) {
  					$("#"+formid).submit();
  				  swal("Berhasil! Data berhasil dihapus!", {
  				    icon: "success",
  				  });
  				} else {
  				  swal("Data aman, tidak terhapus!");
  				}
			})

        });
        

        $('.select2-multiple').select2({
            placeholder: "Choose Categories",
            tags: true
        });