$(document).ready( function() {
	  
	$("#categories").change( function() {
		$.ajax({
			url: "products/" + $("#categories").val()
		}).done(function(response) {
			data = JSON.parse(response);
			
			$("#products").html("");
			var html = '<label>Sub-Categoria: </label>';
			html += '<select id="products" name="products">';
			
			for(i in data.products) {
				str = utf8_decode(data.products[i].producto).split(" ").join("-");
				html += '<option value="' + str + '">' + utf8_decode(data.products[i].producto) + '</option>';
			}
			
			html += '</select>';
			
			$("#section-products").html(html);
			
			$('#products').bind('change', function() {
				brands();
			});
		});
		
		return false;
	});
});

function brands() {
	$.ajax({
		url: "brands/" + $("#products").val()
	}).done(function(response) {
		data = JSON.parse(response);
		
		$("#section-brands").html("");
		var html = '<label>Marca: </label>';
		html += '<select id="brands" name="brands">';
		html += '<option value="0">Todas las marcas</option>';
		var str  = "";
		
		for(i in data.brands) {
			str = utf8_decode(data.brands[i].marca).split(" ").join("-");
			html += '<option value="' + str + '">' + utf8_decode(data.brands[i].marca) + '</option>';
		}
		
		html += '</select>';
		html += '<div id="section-button">';
			html += '<input id="send" name="send" type="button" value="Enviar"/>';
		html += '</div>';
		
		$("#section-brands").html(html);
		
		$('#send').bind('click', function() {
				prices();
				return false;
			});
	});
	
	return false;
}

function prices() {
	$.ajax({
		url: "prices/" + $("#categories").val() + "/" + $("#products").val() + "/" + $("#brands").val()
	}).done(function(response) {
		data = JSON.parse(response);
		
		$("#section-brands").html("");
		var html = '<label>Marca: </label>';
		html += '<select id="brands" name="brands">';
		html += '<option value="0">Todas las marcas</option>';
		var str  = "";
		
		for(i in data.brands) {
			str = utf8_decode(data.brands[i].marca).split(" ").join("-");
			html += '<option value="' + str + '">' + utf8_decode(data.brands[i].marca) + '</option>';
		}
		
		html += '</select>';
		
		html += '<input id="send" name="send" type="button" value="Enviar"/>';
		$("#section-brands").html(html);
	});
	
	return false;
}


function utf8_decode ( str_data ) {
 
    var tmp_arr = [], i = 0, ac = 0, c1 = 0, c2 = 0, c3 = 0;
 
    str_data += '';
 
    while ( i < str_data.length ) {
        c1 = str_data.charCodeAt(i);
        if (c1 < 128) {
            tmp_arr[ac++] = String.fromCharCode(c1);
            i++;
        } else if ((c1 > 191) && (c1 < 224)) {
            c2 = str_data.charCodeAt(i+1);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
            i += 2;
        } else {
            c2 = str_data.charCodeAt(i+1);
            c3 = str_data.charCodeAt(i+2);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }
 
    return tmp_arr.join('');
}
