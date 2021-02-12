$(document).ready(function () { 
    // FETCHING DATA FROM JSON FILE 
    $.getJSON("landscapes.json",  
        function (photographer) {
        	var albumHtml = "";

        	$("#photographer-name").text(photographer.name);
        	$("#photographer-bio").text(photographer.bio);
        	$("#photographer-phone").text(photographer.phone);
        	$("#photographer-email").text(photographer.email);

        	$("#profile-picture").html(`<img src="${photographer.profile_picture}" class="rounded-circle" alt="Profile Picture" height="150" width="150">`);

        	// ITERATING THROUGH ALBUM OBJECTS 
	        $.each(photographer.album, function (key, value) {
	        	albumHtml += `<div class="card m-4" style="width: 20rem;">
	        		<div class="image-container">
						<img src="${value.img}" class="card-img-top" alt="${value.title}">
						<div class="card-img-overlay d-flex flex-column justify-content-center">
					    	<h5 class="card-title">${value.title}</h5>
						</div>
					</div>
					<div class="card-body">
						<p class="card-text">${value.description}</p>
						<span>${ (value.featured == true) ? '<i class="fas fa-heart red-heart"></i>' : '' }</span>
						<span class="float-right text-secondary">${value.date}</span>
					</div>
			    </div>`;
	        });

	        $("#album-container").html(albumHtml);
	    }); 
	}); 