
	
<script type="text/javascript">
	$(document).ready(function() {
        $('select[id="merk_id"]').on('change', function() {
            var merkID = $(this).val();
            if(merkID) {
                $.ajax({
                    url: '/master/vehiclecollateral/type/'+merkID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                        $('select[id="type_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[id="type_id"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
					}
				});
			}else{
				$('select[id="type_id"]').empty();
			}
		});
    });

    function formatNumber(input)
    {
        var num = input.value.replace(/\,/g,'');
        if(!isNaN(num))
        {
            if(num.indexOf('.') > -1)
            {
                num = num.split('.');
                num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
                if(num[1].length > 2)
                {
                    num[1] = num[1].substring(0,num[1].length-1);
                }
                input.value = num[0]+'.'+num[1];
            }
            else
            {
                input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
            }
        }
        else
        {
            alert('You may only enter decimals!');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }
</script>