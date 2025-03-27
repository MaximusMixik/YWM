document.addEventListener('DOMContentLoaded', function() {
    // Listen for clicks on elements with the class .wcs-modal-call
    document.querySelectorAll('.wcs-modal-call').forEach(function(element) {
        element.addEventListener('click', function() {
            // Use a timeout to wait for the .wcs-vue-modal to be added dynamically
            setTimeout(function() {
                // Find the dynamically added .wcs-vue-modal
                const modal = document.querySelector('.wcs-vue-modal');
                if (modal) {
                    console.log('Modal found:', modal); // Debugging line
                    // Find the .wcs-modal__instuctor_id within the modal
                    const instructorIdElement = modal.querySelector('.wcs-modal__instuctor_id');
                    if (instructorIdElement) {
                        // Log the ID to the console
                        const instructorId = instructorIdElement.innerHTML.trim();
                        console.log('Instructor ID:', instructorId);

                        // Make an AJAX request to get the image
                        jQuery.ajax({
                            url: ajaxurl, // WordPress AJAX URL
                            type: 'POST',
                            data: {
                                action: 'get_instructor_image',
                                term_id: instructorId
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Insert the image into the modal
                                    const imageElement = modal.querySelector('.wcs-modal__instuctor_image');
                                    if (imageElement) {
                                        imageElement.innerHTML = '<img src="' + response.data.image_url + '" alt="Instructor Image">';
                                        
                                        // Add CSS dynamically
                                        const style = document.createElement('style');
                                        style.innerHTML = `
                                            .wcs-modal__instuctor_image {
                                                float: left;
                                                padding: 0 15px 0 0;
                                            }
                                        `;
                                        document.head.appendChild(style);
                                    }
                                } else {
                                    console.log('Error:', response.data);
                                }
                            },
                            error: function(error) {
                                console.log('AJAX Error:', error);
                            }
                        });
                    } else {
                        console.log('Instructor ID element not found.');
                    }
                } else {
                    console.log('Modal not found.');
                }
            }, 1000); // Adjust the timeout as needed
        });
    });
}); 