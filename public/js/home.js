// Swap Button Logic
document.getElementById('swapBtn').addEventListener('click', function() {
  var departureInput = document.getElementById('departure');
  var destinationInput = document.getElementById('destination');
  var temp = departureInput.value;
  departureInput.value = destinationInput.value;
  destinationInput.value = temp;
});
// mobile 
document.getElementById('swapButton').addEventListener('click', function() {
      const departureSelect = document.getElementById('departureSelect');
      const destinationSelect = document.getElementById('destinationSelect');
      const temp = departureSelect.value;
      departureSelect.value = destinationSelect.value;
      destinationSelect.value = temp;
  });

// Date Picker Logic
document.querySelector('input[name="date"]').addEventListener('change', function() {
  calculateDays();
});

document.querySelector('input[name="end_date"]').addEventListener('change', function() {
  calculateDays();
});

function calculateDays() {
  var startDate = document.querySelector('input[name="date"]').value;
  var endDate = document.querySelector('input[name="end_date"]').value;

  if (startDate && endDate) {
      var start = new Date(startDate);
      var end = new Date(endDate);
      var timeDiff = Math.abs(end - start);
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

      alert("Estimated days: " + diffDays + " days");
  }
}

let adultCount = 1;
let childCount = 0;

// Fungsi untuk mengupdate jumlah penumpang
function updatePassengerCount() {
const totalPassengers = adultCount + childCount;
document.getElementById('passengerCount').textContent = `${totalPassengers} Passenger${totalPassengers !== 1 ? 's' : ''}`;
}

// Tombol tambah dewasa
document.getElementById('adultPlus').addEventListener('click', () => {
adultCount++;
document.getElementById('adultCount').textContent = adultCount;
updatePassengerCount();
});

// Tombol kurang dewasa
document.getElementById('adultMinus').addEventListener('click', () => {
if (adultCount > 0) {
  adultCount--;
  document.getElementById('adultCount').textContent = adultCount;
  updatePassengerCount();
}
});

// Tombol tambah anak-anak
document.getElementById('childPlus').addEventListener('click', () => {
childCount++;
document.getElementById('childCount').textContent = childCount;
updatePassengerCount();
});

// Tombol kurang anak-anak
document.getElementById('childMinus').addEventListener('click', () => {
if (childCount > 0) {
  childCount--;
  document.getElementById('childCount').textContent = childCount;
  updatePassengerCount();
}
});

// Tombol Done untuk menutup dropdown
document.getElementById('doneButton').addEventListener('click', () => {
const dropdown = new bootstrap.Dropdown(document.getElementById('passengerDropdownButton'));
dropdown.hide();

});

 // Add scroll animation
 document.addEventListener('DOMContentLoaded', function() {
  const reviewCards = document.querySelectorAll('.review-card');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
      }
    });
  }, {threshold: 0.1});
  
  reviewCards.forEach(card => {
    observer.observe(card);
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const viewAllBtn = document.getElementById('viewAllBtn');
  const arrowIcon = document.getElementById('arrowIcon');
  const islandSelection = document.getElementById('islandSelection');
  const destinationCards = document.querySelectorAll('.destination-card');
  const islandFilters = document.querySelectorAll('.island-filter');
  let isExpanded = false;

  // Initially show only popular destinations (first 4 cards)
  document.querySelectorAll('.destination-card:not([data-popular="true"])').forEach(card => {
      card.classList.add('hidden');
  });

  viewAllBtn.addEventListener('click', function() {
      // Toggle island selection visibility
      islandSelection.classList.toggle('hidden');
      
      // Rotate arrow icon
      if (islandSelection.classList.contains('hidden')) {
          arrowIcon.style.transform = 'rotate(0deg)';
          
          // When closing, show only popular destinations
          document.querySelectorAll('.destination-card').forEach(card => {
              if (card.getAttribute('data-popular') === 'true') {
                  card.classList.remove('hidden');
              } else {
                  card.classList.add('hidden');
              }
          });
          
          // Reset active filter to Popular
          islandFilters.forEach(f => f.classList.remove('active', 'bg-red-100', 'border-red-500'));
          document.querySelector('[data-island="popular"]').classList.add('active', 'bg-red-100', 'border-red-500');
          
      } else {
          arrowIcon.style.transform = 'rotate(90deg)';
      }
  });

  // Island filter functionality
  islandFilters.forEach(filter => {
      filter.addEventListener('click', function() {
          // Remove active class from all filters
          islandFilters.forEach(f => f.classList.remove('active', 'bg-red-100', 'border-red-500'));
          
          // Add active class to clicked filter
          this.classList.add('active', 'bg-red-100', 'border-red-500');
          
          const selectedIsland = this.getAttribute('data-island');
          
          // Show/hide destinations based on selection
          destinationCards.forEach(card => {
              if (selectedIsland === 'popular') {
                  if (card.getAttribute('data-popular') === 'true') {
                      card.classList.remove('hidden');
                  } else {
                      card.classList.add('hidden');
                  }
              } else {
                  if (card.getAttribute('data-island') === selectedIsland) {
                      card.classList.remove('hidden');
                  } else {
                      card.classList.add('hidden');
                  }
              }
          });
          
          // Adjust grid columns based on number of visible cards
          const visibleCards = document.querySelectorAll('.destination-card:not(.hidden)');
          const container = document.getElementById('destinationsContainer');
          
          if (visibleCards.length === 1) {
              container.classList.add('md:grid-cols-1');
              container.classList.remove('md:grid-cols-2', 'md:grid-cols-3', 'md:grid-cols-4');
          } else if (visibleCards.length === 2) {
              container.classList.add('md:grid-cols-2');
              container.classList.remove('md:grid-cols-1', 'md:grid-cols-3', 'md:grid-cols-4');
          } else if (visibleCards.length === 3) {
              container.classList.add('md:grid-cols-3');
              container.classList.remove('md:grid-cols-1', 'md:grid-cols-2', 'md:grid-cols-4');
          } else {
              container.classList.add('md:grid-cols-4');
              container.classList.remove('md:grid-cols-1', 'md:grid-cols-2', 'md:grid-cols-3');
          }
      });
  });
});

document.addEventListener('DOMContentLoaded', function() {
  // Get the select element
  const sortSelect = document.querySelector('.popular-destinations select');
  const container = document.getElementById("destinationsContainer");
  
  // Sort functionality - will work on ALL cards
  sortSelect.addEventListener("change", function() {
      const sortValue = this.value;
      const cards = Array.from(container.querySelectorAll(".destination-card"));
      
      // Helper function to extract price from card
      const getPrice = (card) => {
          const priceText = card.querySelector('span.text-gray-500').textContent;
          return parseInt(priceText.replace(/[^\d]/g, ''));
      };
      
      // Helper function to extract date from card
      const getDate = (card) => {
          const dateText = card.querySelector('p.text-gray-500').textContent;
          const datePart = dateText.split(' - ')[0];
          // Assuming format is "Apr 8", convert to sortable date
          const currentYear = new Date().getFullYear();
          return new Date(`${datePart} ${currentYear}`);
      };
      
      if (sortValue === "Most Popular") {
          // Show ALL cards but sort by popularity
          cards.sort((a, b) => {
              const aPopular = a.getAttribute("data-popular") === "true";
              const bPopular = b.getAttribute("data-popular") === "true";
              return bPopular - aPopular; // Popular first
          });
          
          // Make sure ALL cards are visible
          cards.forEach(card => card.classList.remove('hidden'));
      } 
      else if (sortValue === "Newest (Recent)") {
          // Sort by date (newest first) and show ALL
          cards.sort((a, b) => getDate(b) - getDate(a));
          cards.forEach(card => card.classList.remove('hidden'));
      } 
      else if (sortValue === "Price: Low to High") {
          // Sort by price (low to high) and show ALL
          cards.sort((a, b) => getPrice(a) - getPrice(b));
          cards.forEach(card => card.classList.remove('hidden'));
      } 
      else if (sortValue === "Price: High to Low") {
          // Sort by price (high to low) and show ALL
          cards.sort((a, b) => getPrice(b) - getPrice(a));
          cards.forEach(card => card.classList.remove('hidden'));
      }
      
      // Re-render ALL sorted elements
      const fragment = document.createDocumentFragment();
      cards.forEach(card => fragment.appendChild(card));
      container.innerHTML = "";
      container.appendChild(fragment);
  });
});