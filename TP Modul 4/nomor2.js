var name;
var kelas;
var nim;
var gender;

$(document).ready(function() {
	$("input[type='submit']").click(function() {
		//Submit button clicked

		nama = $("input[name='nama']").val();   //Search input that has name 'nama' and get the value
		kelas = $("input[name='kelas']").val(); //Search input that has name 'kelas' and get the value
		nim = $("input[name='nim']").val();      //Search input that has name 'nim' and get the value
		gender = $("input[name='gender']:checked").val();  //Get value of the checked radio button


		//Add table for the inputed form
    	createRow(nama, kelas, nim ,gender);

    	$(".btnDelete").click(function() {
    		var delConfirm = confirm("Are you sure want to delete this row?");
    		if (delConfirm) {
    			$(this).parents("tr").remove();
    		}	
    	})
	});

});

function createRow(nama, kelas, nim, gender) {
	$("#tableResult").append(
    			 "<tr>"+
    			 "<td>"+nama+
				 "</td>"+"<td>"+nim+
			     "</td>"+"<td>"+kelas+
		         "</td>"+"<td>"+gender+
		         "</td>"+"<td><button class='btnDelete'>Delete</button></td></tr>");
}

