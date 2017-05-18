
$().ready(function () {
    $("#vcard_create").validate({
        submitHandler: function () {  
            $("#vcard_create").submit(function (e) { 
                e.preventDefault();   
                var formData = new FormData(this);
                var url = base_url + "savevcard";  
                $.ajax({ 
                    type: "POST", 
                    url: url,  
                    data: formData,
                    cache: false,  
                    contentType: false, 
                    processData: false, 
                    mimeType: "multipart/form-data",
                    dataType: 'json',
                    success: function (data)  
                    {             
                        if (data.status === 1) {  
                            $(".error").html(data.msg); 
                        } else {       
                            $(".error").html(data.msg);  
                        }               
                    }              
                });               
                e.preventDefault();
            });      
        }
    });
});