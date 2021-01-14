//WRITE YOU JS CODE
//ANY APIS should be called in this file.
//Manipulate html from this file including showing data. Your base html rests in home_view.php

//Any global variables to be used.
var smapleVariable = '';
const default_displayed_columns = [
	"date",
	"state",
	"positive",
	"recovered",
	"death",
	"probableCases",
	"pending"
];

$(document).ready(function () {

	$("#form-id").submit(function(e) {
		e.preventDefault();	
	});

		//Core logics
        $("#getData").click(function(){
			//Fetching values from user input(HTML)
            let stateCode_value = $("#stateCode").val();
            let startDate_value = parseInt($("#startDate").val().replaceAll("-", ""));
			let endDate_value = parseInt($("#endDate").val().replaceAll("-", ""));

			if(startDate_value > endDate_value) {
				alert("Start Date should be before End Date");
				return;
			}
			
			//If you need to write any extra functions.
		   var fetchOutput = function(stateCode_value, startDate_value, endDate_value){
		          $.get("https://api.covidtracking.com/v1/states/" + stateCode_value + "/daily.json", function(data, status) {
		          let required_results = [];
					data.forEach(record => {
						if(record.date >= startDate_value && record.date <= endDate_value) {
							required_results.push(record);
						}
					});
					//Post to data to insert it into the DB
					insertResultsIntoDB(stateCode_value, required_results);
					// Construct the output to be displayed in a dataNet table
					var elements = constructOutputTable(required_results);
					$("#output").empty();
					elements.forEach(element => $("#output").append(element));
					$("#output").addClass("bg-light");
					//Converting the output table to data net table
					convertToDataNetTable();
				});
			}

			//Preparing the output to be displayed and putting the data into the DB
			fetchOutput(stateCode_value, startDate_value, endDate_value);

			function insertResultsIntoDB(stateCode_value, required_results){
				$.post("API.php", {stateCode: stateCode_value, resultCount: required_results.length}, function(api_response) {
					api_response = JSON.parse(api_response);
					if(api_response['msg'] == "Success") {
						console.log("Data Uploaded Successfully");
					} else {
						console.log("Failed to Upload Data");
					}
				});
			}

			function constructOutputTable(required_results){
				let table = $("<table/>", {
					id: "result-table",
					class: "display",
					style: "width: 100%"
				});
				let column_names = $("<div/>", {
					text: 'Select Columns to be displayed:',
					style: "overflow-x: scroll; height: 250px; font-weight: bold"
				});
				
				if(required_results.length > 0) {
					let header_row = $("<tr/>");
					let first_row = required_results[0];
					let index = 0;
					for(let key in first_row) {
						if(typeof key == "string") {
							let header_column = $("<th/>", {
								text: key
							});
							$(header_row).append(header_column);
							let option = $("<input/>", {
									class: 'toggle-vis',
									id: key,
									type: "checkbox",
									"data-column": index
								});
							$(option).attr("checked", default_displayed_columns.includes(key));
							let container = $("<div/>", {
								class: "col-md-4 mb-3"
							}).append(option);
							$(container).append(
								$("<label/>", {
									text: key,
									class: "label-class"
								})
							)
							$(column_names).append(container);
							index++;
						}
					}
					let thead = $("<thead/>").append(header_row);
					$(table).append(thead);
				}
				let tbody = $("<tbody/>");
				required_results.forEach(row_data => {
					let row = $("<tr/>");
					for(let key in row_data) {
						let column;
						if(key == "date") {
							column = $("<td/>", {
								text: ((row_data[key] != null ? (formatDate(row_data[key]+"")) : (null)) || "N/A")
							});
						} else {
							column = $("<td/>", {
								text: (row_data[key] || "N/A")
							});
						}
						$(row).append(column);
					}
					$(tbody).append(row);
				});
				$(table).append(tbody);
				
				//To display the active, confirmed, recovered and deceased cards
				showHighlights(required_results);
				return [table, column_names];
			}

			function convertToDataNetTable(){
					let data_table = $('#result-table').DataTable( {
						scrollX: true
					} );	

					$('input.toggle-vis').on( 'click', function (e) {
						var column = data_table.column( $(this).attr('data-column') );
				
						// Toggle the visibility
						column.visible( ! column.visible() );
					} );

					$('input.toggle-vis').each(function (element, index) {
						if(!default_displayed_columns.includes($(this).attr("id"))) {
							var column = data_table.column( $(this).attr('data-column') );
							column.visible( ! column.visible() );
							$(this).attr("checked", false);
						}
					} );
			
			}

			function showHighlights(records) {
				records.sort((a, b) => {
					return a['date'] - b['date'];
				});
				let first_record = records[0];
				let last_record = records[records.length-1];

				let active_cases = last_record.positive - last_record.death;

				let recovered = last_record.negative;
				let recovered_diff = last_record.negative - first_record.negative;

				let confirmed = last_record.positive;
				let confirmed_diff = last_record.positive - first_record.positive;

				let deceased = last_record.death;
				let deceased_diff = last_record.death - first_record.death;

				$("#active_cases").text(active_cases);
				$("#recovered").text(recovered);
				$("#recovered_diff").text((recovered_diff > 0 ? "+" : "")  + recovered_diff);
				$("#confirmed").text(confirmed);
				$("#confirmed_diff").text((confirmed_diff > 0 ? "+" : "") +  confirmed_diff);
				$("#deceased").text(deceased);
				$("#deceased_diff").text((deceased_diff > 0 ? "+" : "") +  deceased_diff);

				$("#highlights").css({"display":"flex"});

			}
	});
});

function formatDate(date_string) {
	return date_string.substring(0, 4) + "-" + date_string.substring(4, 6) + "-" + date_string.substring(6, 8);
}