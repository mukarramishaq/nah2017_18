$("#employed").change(function () {

		if($("#employed").val() === 'employed'){
        
       		$('.Employed').removeClass('collapse');
       		$('.Self-employed').addClass('collapse');       		
       		$('.Self-employed-designation').addClass('collapse');
			$('.Self-employed-industry').addClass('collapse');
			$('.Employed-designation').addClass('collapse');
			$('.Employed-industry').addClass('collapse');


       		$(".Employed").prop('required', true);
       		$(".Self-employed").prop('required',false);
       		$(".Self-employed-designation").prop('required',false);
       		$(".Self-employed-industry").prop('required',false);
       		$('.Employed-designation').prop('required',false);
			$('.Employed-industry').prop('required',false);

       		if($("#designation").val() === 'other')
			{
				$('.Employed-designation').removeClass('collapse');
				$('.Employed-designation').prop('required',true);
			}
			if($("#industry").val() === 'other')
			{
				$('.Employed-industry').removeClass('collapse');
				$('.Employed-industry').prop('required',true);
			}
       		
   		}
   		else if($("#employed").val() === 'unemployed'){
			
			$('.Employed').addClass('collapse');
       		$('.Self-employed').addClass('collapse');       		
       		$('.Self-employed-designation').addClass('collapse');
			$('.Self-employed-industry').addClass('collapse');
			$('.Employed-designation').addClass('collapse');
			$('.Employed-industry').addClass('collapse');


       		$(".Employed").prop('required', false);
       		$(".Self-employed").prop('required',false);
       		$(".Self-employed-designation").prop('required',false);
       		$(".Self-employed-industry").prop('required',false);
       		$('.Employed-designation').prop('required',false);
			$('.Employed-industry').prop('required',false);

       		
   		}
   		else if($("#employed").val() === 'selfemployed'){
			
			$('.Employed').addClass('collapse');
       		$('.Self-employed').removeClass('collapse');       		
       		$('.Self-employed-designation').addClass('collapse');
			$('.Self-employed-industry').addClass('collapse');
			$('.Employed-designation').addClass('collapse');
			$('.Employed-industry').addClass('collapse');

		

       		$(".Employed").prop('required', false);
       		$(".Self-employed").prop('required',true);
       		$(".Self-employed-designation").prop('required',false);
       		$(".Self-employed-industry").prop('required',false);
       		$('.Employed-designation').prop('required',false);
			$('.Employed-industry').prop('required',false);

       		if($("#eDesignation").val() === 'other')
			{
				$('.Self-employed-designation').removeClass('collapse');
				$('.Self-employed-designation').prop('required',true);
			}
			if($("#eIndustry").val() === 'other')
			{
				$('.Self-employed-industry').removeClass('collapse');
				$('.Self-employed-industry').prop('required',true);
			}
   		}
 });
$("#industry").change(function () {

	if($("#industry").val() === 'other')
	{
		$('.Employed-industry').removeClass('collapse');
		$('.Employed-industry').prop('required',true);
	}
	else
	{
		$('.Employed-industry').addClass('collapse');
		$('.Employed-industry').prop('required',false);
	}
});
$("#eIndustry").change(function () {

	if($("#eIndustry").val() === 'other')
	{
		$('.Self-employed-industry').removeClass('collapse');
		$('.Self-employed-industry').prop('required',true);
	}
	else
	{
		$('.Self-employed-industry').addClass('collapse');
		$('.Self-employed-industry').prop('required',false);
	}
});
$("#designation").change(function () {

	if($("#designation").val() === 'other')
	{
		$('.Employed-designation').removeClass('collapse');
		$('.Employed-designation').prop('required',true);
	}
	else
	{
		$('.Employed-designation').addClass('collapse');
		$('.Employed-designation').prop('required',false);
	}
});
$("#eDesignation").change(function () {

	if($("#eDesignation").val() === 'other')
	{
		$('.Self-employed-designation').removeClass('collapse');
		$('.Self-employed-designation').prop('required',true);
	}
	else
	{
		$('.Self-employed-designation').addClass('collapse');
		$('.Self-employed-designation').prop('required',false);
	}
});