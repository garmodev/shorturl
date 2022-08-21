 $('.show_confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      Swal.fire({
        title: 'คุณต้องการลบข้อมูลนี้ ใช่ หรือ ไม่',
        text: "คุณจะไม่สามารถย้อนกลับได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ไม่'

      })
      .then((willDelete) => {
        if (willDelete.isConfirmed) {
            Swal.fire(
                'ลบแล้ว!',
                'ข้อมูลของคุณถูกลบแล้ว',
                'success')
            form.submit();
        }
      });
  });

  function jsPaste(){
    navigator.clipboard.readText()
    .then(txt =>{
        document.getElementById("demo").value = txt;
    })
    .catch(err=>{
        alert("No add");
    });
}



