
function selectColor(colorGroup, colorName, groupId) {
  const groupContainer = document.getElementById(groupId);

  groupContainer.querySelectorAll('.color-item').forEach(el => {
      el.classList.remove('selected');
  });

  const selectedItem = Array.from(groupContainer.querySelectorAll('.color-item')).find(item => {
      return item.querySelector('h5').textContent === colorName;
  });

  selectedItem.classList.add('selected'); // Add the 'selected' class to the clicked item

  const selectedColorElement = document.getElementById(`selected${colorGroup}`);
  selectedColorElement.textContent = colorName;
}

//SECTION AREA
let currentSection = 1; 
  let serviceSelected = null;

  showSection(currentSection);

  // Function to show a specific section
  function showSection(sectionNumber) {
    document.querySelectorAll('.form-section').forEach(section => {
      section.classList.remove('active');
    });
    document.getElementById(`section${sectionNumber}`).classList.add('active');
  }

  // Handle the next button click for each section
  document.querySelectorAll('[id^="next-button-service"]').forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault();

      const selectedServiceRadio = document.querySelector('input[name="servicePlace"]:checked');
      if (!selectedServiceRadio) {
        console.error("No service selected");
        return;
      }
      serviceSelected = selectedServiceRadio.value;

      // Handle navigation based on the current section and selected service
      if (serviceSelected === 'home') {
        if (currentSection === 1) {
          currentSection = 4; //special section
        } else if (currentSection === 4) {
          currentSection = 2; 
        } else if (currentSection === 2) {
          currentSection = 3; 
        }
      } else if (serviceSelected === 'owner') {
        if (currentSection === 1) {
          currentSection = 2; 
        } else if (currentSection === 2) {
          currentSection = 3;
        }
      }

      showSection(currentSection);
    });
  });

  // Handle the back button click
  document.querySelectorAll('[id^="back-button-service"]').forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default anchor behavior

      // Handle going back depending on current section
      if (currentSection === 3) {
        currentSection = 2; 
      } else if (currentSection === 2) {
        currentSection = 1;
      } else if (currentSection === 4) {
        currentSection = 1;
      }

      showSection(currentSection); // Show the new section
    });
  });

  //google mapppp
  let map;
let directionsService;
let directionsRenderer;
let destinationAutoComplete;
let sourceAddress = { lat: 45.435095, lng: -73.672204 };

function initMap() {
map = new google.maps.Map(document.getElementById('map'), {
  center: { lat: 45.5017, lng: -73.5673 },
  zoom: 13
});

google.maps.event.addListener(map, "click", function(event) {
  this.setOptions({ scrollwheel: true });
});

directionsService = new google.maps.DirectionsService();
directionsRenderer = new google.maps.DirectionsRenderer();
directionsRenderer.setMap(map);

destinationAutoComplete = new google.maps.places.Autocomplete(
  document.getElementById('destination')
);
}

function calcRoute() {
let destination = document.getElementById('destination').value;
var output =  document.getElementById('output');

let request = {
  origin: sourceAddress,
  destination: destination,
  travelMode: 'DRIVING'
};

directionsService.route(request, function(result, status) {
  if (status === "OK") {
    directionsRenderer.setDirections(result);
    
    // Calculate and display the distance
    const distanceInMeters = result.routes[0].legs[0].distance.value;
    const distanceInKm = (distanceInMeters / 1000).toFixed(2); // Convert to km and round to 2 decimals
    output.innerHTML = `<h3>${distanceInKm} km</h3>`;
    output.classList.add('result-design');

    // Check if within 20 km range
    if (distanceInKm <= 20) {
      output.innerHTML = `<p>Within 20 km range for home service.</p>`;
      output.style.color = "#667744";
    } else {
      output.innerHTML = `<p>Outside the 20 km range for home service.</p>`;
      output.style.color = "#D9534F";
    }

  } else {
    output.innerHTML = `<p>Location not found</p>`;
    output.style.color = "#D9534F";
  }
});
}

