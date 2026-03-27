/**
 * Forms JavaScript
 * TBDesigned Theme - AJAX form handling
 */

(function() {
    'use strict';

    // Contact form handler
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', async function(event) {
            event.preventDefault();

            const submitButton = this.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            const messageDiv = document.getElementById('form-message') || createMessageDiv(this);

            // Disable submit button
            submitButton.disabled = true;
            submitButton.textContent = 'Sending...';

            // Clear previous messages
            messageDiv.className = 'form-message';
            messageDiv.textContent = '';

            // Gather form data
            const formData = new FormData(this);
            formData.append('action', 'tbdesigned_contact_form');
            formData.append('nonce', tbdesigned_ajax.nonce);

            try {
                const response = await fetch(tbdesigned_ajax.ajax_url, {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    messageDiv.className = 'form-message form-message--success';
                    messageDiv.textContent = data.data.message;
                    contactForm.reset();
                } else {
                    messageDiv.className = 'form-message form-message--error';
                    messageDiv.textContent = data.data.message || 'Something went wrong. Please try again.';
                }
            } catch (error) {
                messageDiv.className = 'form-message form-message--error';
                messageDiv.textContent = 'Network error. Please check your connection and try again.';
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
                
                // Scroll to message
                messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        });
    }

    // Newsletter form handler
    const newsletterForms = document.querySelectorAll('.newsletter-form');
    
    newsletterForms.forEach(function(form) {
        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const submitButton = this.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            const messageDiv = this.querySelector('.form-message') || createMessageDiv(this);

            submitButton.disabled = true;
            submitButton.textContent = 'Subscribing...';

            messageDiv.className = 'form-message';
            messageDiv.textContent = '';

            const formData = new FormData(this);
            formData.append('action', 'tbdesigned_newsletter_signup');
            formData.append('nonce', tbdesigned_ajax.nonce);

            try {
                const response = await fetch(tbdesigned_ajax.ajax_url, {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    messageDiv.className = 'form-message form-message--success';
                    messageDiv.textContent = data.data.message;
                    form.reset();
                } else {
                    messageDiv.className = 'form-message form-message--error';
                    messageDiv.textContent = data.data.message;
                }
            } catch (error) {
                messageDiv.className = 'form-message form-message--error';
                messageDiv.textContent = 'Network error. Please try again.';
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            }
        });
    });

    // Helper: Create message div
    function createMessageDiv(form) {
        const div = document.createElement('div');
        div.id = 'form-message';
        div.className = 'form-message';
        form.insertBefore(div, form.firstChild);
        return div;
    }

    // Form validation
    const forms = document.querySelectorAll('form');
    
    forms.forEach(function(form) {
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        
        inputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                validateInput(this);
            });

            input.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    validateInput(this);
                }
            });
        });
    });

    // Validate single input
    function validateInput(input) {
        const formGroup = input.closest('.form-group');
        let errorMsg = formGroup ? formGroup.querySelector('.form-error') : null;

        // Remove existing error
        if (errorMsg) {
            errorMsg.remove();
        }
        input.classList.remove('error');

        // Check validity
        if (!input.validity.valid) {
            input.classList.add('error');
            
            if (formGroup) {
                errorMsg = document.createElement('span');
                errorMsg.className = 'form-error';
                errorMsg.textContent = input.validationMessage;
                formGroup.appendChild(errorMsg);
            }
            
            return false;
        }

        return true;
    }
})();
