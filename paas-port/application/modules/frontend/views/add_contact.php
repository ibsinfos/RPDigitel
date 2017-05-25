<div class="main"> 
    <div class="main-inner">  
        <div class="container">   
            <div class="row">         
                <div class="span12">     
                    <div class="widget ">    
                        <div class="widget-header">   
                            <i class="icon-user"></i>   
                            <h3>Your Account</h3>   
                        </div> <!-- /widget-header -->  
                        <div class="widget-content">   
                            <div class="tabbable">        
                                <br>                       
                                <div id="Text_Message_Form">   
                                    <div class="" id="formcontrols">   
                                        <form method="POST" id="contactfrm" class="form-horizontal"> 
                                            <fieldset>                            
                                                <div class="control-group">    		
                                                    <label class="control-label" for="radiobtns">Template</label>     
                                                    <div class="controls">                         
                                                        <div class="Theme_DropDown">  
                                                            <select name="list_type" id="list_type">  
                                                                <option>Choose List Type</option>       
                                                                <option value="0">Opt in database</option> 
                                                                <option value="1">Lead Database(Usera are not opted in)</option>    
                                                            </select>                                              
                                                        </div>                           
                                                    </div>	<!-- /controls -->		
                                                </div>                         
                                                <div class="control-group">	
                                                    <label class="control-label" for="username">List Name</label>      
                                                    <div class="controls">                                        
                                                        <input type="text" class="span6" required="required" id="listname" name="listname"> 
                                                    </div> <!-- /controls -->				                                           
                                                </div> <!-- /control-group -->                                             
                                                <div class="control-group">											 
                                                    <label class="control-label" for="firstname">Selected Keywords</label>   
                                                    <div class="controls">                                                 
                                                        <select multiple  class="span6" id="firstname" value="John"></select>  
                                                    </div> <!-- /controls -->	                                           
                                                    <div class="Reload_Button">                                            
                                                        <button>Update</button>                                                
                                                    </div>                              
                                                </div> <!-- /control-group -->      
                                                <div class="control-group">			
                                                    <label class="control-label" for="lastname">Opt in message</label>      
                                                    <div class="controls">                                            
                                                        <textarea  class="span6" id="lastname" value="Donga"></textarea>  
                                                    </div> <!-- /controls -->				                          
                                                </div> <!-- /control-group -->                                    
                                                <div class="control-group">										
                                                    <label class="control-label" for="email">Estimated frequency</label> 
                                                    <div class="controls">                                               
                                                        <select>                                                     
                                                            <option value="1">1</option>                                 
                                                            <option value="1">2</option>                                 
                                                            <option value="1">3</option>                                 
                                                            <option value="1">4</option>                                 
                                                            <option value="1">5</option>                                 
                                                            <option value="6">6</option>                                 
                                                            <option value="7">7</option>                                 
                                                            <option value="8">8</option>                                 
                                                            <option value="9">9</option>                                 
                                                            <option value="10">10</option>                               
                                                            <option value="11">11</option>                               
                                                            <option value="12">12</option>                               
                                                            <option value="13">13</option>                               
                                                            <option value="14">14</option>                               
                                                            <option value="15">15</option>                               
                                                        </select> PER                                                
                                                        <select>                                                     
                                                            <option value="1">Month</option>                             
                                                            <option value="1">Week</option>                              
                                                            <option value="1">Day</option>                               
                                                        </select>                                                    
                                                    </div> <!-- /controls -->				                     
                                                </div> <!-- /control-group -->                               
                                                <div class="control-group">									
                                                    <label class="control-label" for="password1">Personlization, ask for</label>       
                                                    <div class="controls">                                                      
                                                        <select name="optInForm:_id123" size="1" class="selectOneMenuSmooth" >      
                                                            <option value="0" selected="selected">None</option>                         
                                                            <option value="1">Name and Zip Code</option>                                
                                                            <option value="2">Name and Email</option>	                                
                                                            <option value="3">Name and Birthday</option>                                
                                                            <option value="4">Name and Gender</option>	                                
                                                            <option value="5">Name and Marital Status</option>	                        
                                                            <option value="6">Name and Company</option>                                 
                                                            <option value="7">Name and Notes</option>                                   
                                                        </select>                                                
                                                    </div> <!-- /controls -->				                 
                                                </div> <!-- /control-group -->                           
                                                <div class="control-group">								
                                                    <label class="control-label"></label>                    
                                                    <div class="controls">                                   
                                                        <label class="checkbox inline">                          
                                                            <input type="checkbox"> Require double opt in            
                                                        </label>                                                 
                                                    </div>		<!-- /controls -->                           
                                                    <div class="controls">                                  
                                                        <label class="checkbox inline">                         
                                                            <input type="checkbox"> custom reply yes message        
                                                        </label>                                                
                                                    </div>                                               
                                                </div> <!-- /control-group -->                       
                                                <div class="control-group">		
                                                    <label class="control-label" for="password2"></label>  
                                                    <div class="controls">                                 
                                                        <textarea class="span4" id="password2" value="thisispassword"></textarea>    
                                                    </div> <!-- /controls -->				                                     
                                                </div> <!-- /control-group -->                                               
                                                <div class="control-group">											         
                                                    <label class="control-label"></label>                                        
                                                    <div class="controls">                                                       
                                                        <label class="checkbox inline">                                              
                                                            <input type="checkbox"> Alternative auto reply (For existing subscribers)    
                                                        </label>                                                 
                                                    </div>                                                  
                                                    <div class="controls">                                  
                                                        <label class="checkbox inline">                         
                                                            <input type="checkbox"> Notify me when user opts in     
                                                        </label>                                                
                                                    </div>		<!-- /controls -->		                    
                                                </div> <!-- /control-group -->                          
                                                <br />                                              
                                                <div class="form-actions">                          
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Save">    
                                                    <button type="button" onclick="javascript:window.history.back();" class="btn">Cancel</button>                          
                                                </div> <!-- /form-actions -->                                          
                                            </fieldset>                                      
                                        </form>                                    
                                    </div>                             
                                </div>                          
                            </div>                        
                        </div> <!-- /widget-content -->   
                    </div> <!-- /widget -->           
                </div> <!-- /span8 -->       
            </div> <!-- /row -->      
        </div> <!-- /container -->
    </div> <!-- /main-inner --></div> 
    <!-- /main --><!--include jQuery --><!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"type="text/javascript"></script>--><!--include jQuery Validation Plugin-->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"type="text/javascript"></script>
<!--Optional: include only if you are using the extra rules in additional-methods.js -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/additional-methods.min.js"type="text/javascript"></script>
<script> $(document).ready(function () {
        $('#contactfrm').validate({// initialize the plugin      
            rules: {
                listname: {
                    required: true
                }},
            messages: {
                listname: {
                    required: "Enter list name"
                }
            },
            submitHandler: function (form) {
// for demo         
                alert('valid form submitted');
// for demo          
                return false; // for demo   
            }
        });
    });</script>
