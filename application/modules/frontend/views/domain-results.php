<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<form name="frm_search_domains" id="frm_search_domains" action="<?php echo base_url(); ?>domains-results" method="POST"enctype="multipart/form-data" >
   <input style="margin-left:50px;margin-top:50px;" type="text" name="search" id="search" value="" />
   <input type="checkbox" id="com" name="domainTld[]" class="domain" value=".com" />.com &nbsp;&nbsp;
   <input type="checkbox" id="org" name="domainTld[]" class="domain"  value=".org" />.org &nbsp;&nbsp;
   <input type="checkbox" id="in" name="domainTld[]" class="domain" value=".in" />.in &nbsp;&nbsp;
    <button type="button" name="btn_submit" placeholder="Enter a domain name" class="btn btn-primary" value="" id="btnSubmit" >Search Domain</button>
        <div id="domain_div">
        </div>
</form>




<script type="text/javascript">
                
                jQuery(document).ready(function(e) { 
                $('#btnSubmit').click(function() { 
               
                    var search = $('#search').val();
                   
                  
                    $.ajax({
                        url: "<?php echo base_url() . 'get-domain-results'; ?>", //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        //data: "search=" + search, //The variables which are going.
                        data: {
                            search: search,
                            //domainTld: JSON.stringify(p),
                        },
                        dataType: "html", //Return data type (what we expect).

                        //This is the function which will be called if ajax call is successful.
                        success: function(data) { 
                            //data is the html of the page where the request is made.
                            $('#domain_div').html(data);
                        }
                    });
                });


            });
            </script>