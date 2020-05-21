$(document).ready(function(){
    $('.deleteform').click(function(evt){
        var nameTH=$(this).data("name");
        var code=$(this).data("code");
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title:`ต้องการลบข้อมูล ${code} ${nameTH} หรือไม่ ?`,
            text:"ถ้าลบแล้วไม่สามารถกู้คืนได้",
            icon:"warning",
            buttons:true,
            dangerMode:true
        }).then((wilDelete)=>{
            if(wilDelete){
                form.submit();
            }
        });
    });
});
