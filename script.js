// Add confirmation before form submission (optional)
document.addEventListener('DOMContentLoaded', function () {
  const bookingForm = document.querySelector("form");

  if (bookingForm) {
    bookingForm.addEventListener("submit", function (e) {
      const confirmBooking = confirm("Do you want to confirm your ticket booking?");
      if (!confirmBooking) {
        e.preventDefault(); // Cancel submission if user clicks "Cancel"
      }
    });
  }
});
