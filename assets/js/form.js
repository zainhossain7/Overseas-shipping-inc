const form = document.getElementById('bookingForm');

form.addEventListener('submit', e => {
    e.preventDefault();
    
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);
    
    // Replace with your Google Sheet Web App URL
    const scriptURL = 'YOUR_GOOGLE_SCRIPT_URL';

    fetch(scriptURL, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        alert('Booking submitted successfully!');
        form.reset();
    })
    .catch(error => {
        console.error('Error!', error.message);
        alert('There was an error submitting your booking. Please try again.');
    });
}); 