


function delete_selected_feature(feature_id){
	
	$("#table_plan_features > tbody tr#"+feature_id).remove();
	
	
	/*
		var new_total=0;
		$( ".plan_price" ).each(function() {
		
		var single_plan_price=($(this).html());
		new_total=parseInt(new_total)+parseInt(single_plan_price);
		
		});
		
		
		$("#subcription_plans_total").text(parseInt(new_total));
		$("#pricing_plan_total").val(parseInt(new_total));
	*/
	
	
	/*AJAX Request to remove plan start*/
	/*	$.ajax({
		
		url:'<?php echo base_url();?>user/fiberrails/removeFromCart_Plan',
		
		method:'post',
		
		async: false,
		
		data:{'plan_cat':cat},
		
		success:function(data){
		
		// alert(data);
		
		}					
		
	});*/
	/*AJAX Request to remove plan end*/
	
	
	
	
}






var add_f_cont=0;
var all_records=[];
function add_feature(){
	
	
	add_f_cont++;
	// alert(add_f_cont);
	
	
	
	// $("#table_plan_features > tbody tr#"+feature_id).remove();
	
	var new_feature=$("#add_new_feature").val();
	$("#add_new_feature").val('');
	
	$("#table_plan_features > tbody").append("<tr id='new_"+add_f_cont+"'><td><input type='hidden' name='new_added_feature[]' value='"+new_feature+"'>"+new_feature+"</td><td><input type='button' value='X' onclick=\"delete_selected_feature('new_"+add_f_cont+"')\" name='del_featureid' id='del_new"+add_f_cont+"'></td></tr>");
	
	$("#add_new_feature").focus();
	
	/*
		if((all_records.indexOf(name) == -1)){ //To check Duplicate
		
		
		
		// all_records.push(name);
		
		all_records.push({title:cat,link:name});
		
		// alert(JSON.stringify(all_records));
		
		// delete all_records['fiber'];
		
		
		// const index = all_records.indexOf('Fiber plan 3');
		// array.splice(index, 1);
		// alert(index);
		
		
		
		$("#table_subcription_plans > tbody tr#"+cat).remove();
		
		
		
		$("#table_subcription_plans > tbody").append("<tr id='"+cat+"'><td>"+name+"</td><td>"+duration+"</td><td class='plan_price'>"+price+" <input type='button' value='X' onclick=\"delete_selected_plan('"+cat+"')\" name='del_"+cat+"' id='del_"+cat+"'></td></tr>");
		
		//*AJAX Request to add plan start
		$.ajax({
		
		url:'<?php echo base_url();?>user/fiberrails/addToCart_Plan',
		
		method:'post',
		
		async: false,
		
		data:{'plan_cat':cat,'plan_name':name,'plan_duration':duration,'plan_price':price},
		
		success:function(data){
		
		// $("#project_portfolio").empty();
		// alert(data);
		// $("#billing_state").html(data);
		
		}					
		
		});
		//*AJAX Request to add plan end
		
		
		var pre_total=$("#subcription_plans_total").text();
		
		
		var new_total=0;
		$( ".plan_price" ).each(function() {
		
		var single_plan_price=($(this).html());
		// alert(strr);
		new_total=parseInt(new_total)+parseInt(single_plan_price);
		});
		
		
		// var new_total=parseInt(pre_total)+parseInt(price);
		
		$("#subcription_plans_total").text(parseInt(new_total));
		$("#pricing_plan_total").val(parseInt(new_total));
		
		}
		
	*/
	
}





