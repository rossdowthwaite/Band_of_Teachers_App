function deleteuser(form)
		{
				
		var checkBox = document.getElementsByName('check_list[]');
		var lenBox = checkBox.length;
		var foundBox = false;
		
		while( lenBox--> 0 )
			{
				if( checkBox[lenBox].checked === true )
					{
						foundBox = true;
						break;
					}
			}
		
		if( !foundBox )
			{
			alert("Please select a record to delete");
			return;
			}
		
		var r=confirm("Once deleted, these records are gone forever.\n\n Are you SURE you want to proceed? ");
		if (r==true)
			{
			form.submit();
			}
		else
			{
			alert("Phew! That was close!\n\n No records were deleted.");
			window.location.reload(true);
			}
		return;
		}