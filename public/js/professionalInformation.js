$("#employed").change(function () {
	ChangeForm();
 });
$("#industry").change(function () {
	AddOtherIndustry();
});
$("#eIndustry").change(function () {
	AddOtherSIndustry();
});
$("#designation").change(function () {
	AddOtherDesignation();
});
$("#eDesignation").change(function () {
	AddOtherSDesignation();	
});

// A $( document ).ready() block.
$( document ).ready(function() {
    ChangeForm();
    AddOtherIndustry();
    AddOtherSIndustry();
    AddOtherDesignation();
    AddOtherSDesignation();
});

function ChangeForm()
{

		if($("#employed").val() === 'employed'){
        
       		$('.Employed').removeClass('collapse');
       		$('.Self-employed').addClass('collapse');       		
       		$('.Self-employed-designation').addClass('collapse');
			$('.Self-employed-industry').addClass('collapse');
			$('.Employed-designation').addClass('collapse');
			$('.Employed-industry').addClass('collapse');
			$('.Higher-education').addClass('collapse');


       		$(".Employed").prop('required', true);
       		$(".Self-employed").prop('required',false);
       		$(".Self-employed-designation").prop('required',false);
       		$(".Self-employed-industry").prop('required',false);
       		$('.Employed-designation').prop('required',false);
			$('.Employed-industry').prop('required',false);
			$('.Higher-education').prop('required' ,false);

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
			$('.Higher-education').addClass('collapse');


       		$(".Employed").prop('required', false);
       		$(".Self-employed").prop('required',false);
       		$(".Self-employed-designation").prop('required',false);
       		$(".Self-employed-industry").prop('required',false);
       		$('.Employed-designation').prop('required',false);
			$('.Employed-industry').prop('required',false);
			$('.Higher-education').prop('required' ,false);

       		
   		}
   		else if($("#employed").val() === 'highereducation'){
			
			$('.Employed').addClass('collapse');
       		$('.Self-employed').addClass('collapse');       		
       		$('.Self-employed-designation').addClass('collapse');
			$('.Self-employed-industry').addClass('collapse');
			$('.Employed-designation').addClass('collapse');
			$('.Employed-industry').addClass('collapse');
			$('.Higher-education').removeClass('collapse');


       		$(".Employed").prop('required', false);
       		$(".Self-employed").prop('required',false);
       		$(".Self-employed-designation").prop('required',false);
       		$(".Self-employed-industry").prop('required',false);
       		$('.Employed-designation').prop('required',false);
			$('.Employed-industry').prop('required',false);
			$('.Higher-education').prop('required' ,true);

       		
   		}
   		else if($("#employed").val() === 'selfemployed'){
			
			$('.Employed').addClass('collapse');
       		$('.Self-employed').removeClass('collapse');       		
       		$('.Self-employed-designation').addClass('collapse');
			$('.Self-employed-industry').addClass('collapse');
			$('.Employed-designation').addClass('collapse');
			$('.Employed-industry').addClass('collapse');
			$('.Higher-education').addClass('collapse');

		

       		$(".Employed").prop('required', false);
       		$(".Self-employed").prop('required',true);
       		$(".Self-employed-designation").prop('required',false);
       		$(".Self-employed-industry").prop('required',false);
       		$('.Employed-designation').prop('required',false);
			$('.Employed-industry').prop('required',false);
			$('.Higher-education').prop('required' ,false);

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
}

function AddOtherIndustry()
{
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
}

function AddOtherSIndustry(){

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
}

function AddOtherDesignation()
{
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
}
function AddOtherSDesignation()
{
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

}