

$('.like').on('click',function () {
	var like_s=$(this).attr('datalike');
	var post_id=$(this).attr('postId');
    var count_like= document.getElementById(post_id+'Cl');
    var count_dislike= document.getElementById(post_id+'Cd');
    
    
	// alert(post_id);
    $.ajax({
        
        type:'POST',
        url:'/like',
        data:{like_s:like_s,post_id: post_id,_token: token},
        
        success:function(data){
        	// alert(data.is_like);  
       	if (data.is_like==1) 
       	{
       	$('#'+post_id+'l').removeClass('btn-secondary').addClass('btn-success');
       		
            count_like.innerHTML=parseInt(count_like.innerHTML)+1;
            if (data.change_like==1) {

            	$('#'+post_id+'d').removeClass('btn-danger').addClass('btn-secondary');	
            count_dislike.innerHTML=parseInt(count_like.innerHTML)-1;
            }
       
       	}

       	if (data.is_like==0) 
       	{
       	$('#'+post_id+'l').removeClass('btn-success').addClass('btn-secondary');
            count_like.innerHTML=parseInt(count_like.innerHTML)-1;
       	}


        }
        
    });
});

$('.dislike').on('click',function () {
	var like_s=$(this).attr('datalike');
	var post_id=$(this).attr('postId');
	 var count_dislike= document.getElementById(post_id+'Cd');
	var count_like= document.getElementById(post_id+'Cl');
	

	
	
	// alert(like_s);
    $.ajax({
        
        type:'POST',
        url:'/dislike',
        data:{like_s:like_s,post_id: post_id,_token: token},
        
        success:function(data){
        	 // alert(data.is_like);  
       	if (data.is_like==1) 
       	{
       		$('#'+post_id+'d').removeClass('btn-danger').addClass('btn-secondary');	
            count_dislike.innerHTML=parseInt(count_dislike.innerHTML)-1;
       				
       
       	}

       	if (data.is_like==0) 
       	{
       		$('#'+post_id+'d').removeClass('btn-secondary').addClass('btn-danger');	
       	//	$('#'+post_id+'l').removeClass('btn-success').addClass('btn-secondary');
            count_dislike.innerHTML=parseInt(count_dislike.innerHTML)+1;
            if (data.change_dislike==1) {

            	$('#'+post_id+'l').removeClass('btn-success').addClass('btn-secondary');
            count_like.innerHTML=parseInt(count_like.innerHTML)-1;
            }
       	}


        }
        
    });
});

