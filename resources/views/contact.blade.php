@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset($bannerImage) }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Contact HandyVibe</h1>
                            <h2>Have questions about your privacy or our services? We're here to help.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-contact">
        <div class="container">
            @if($contactContent)
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="contact-content">
                        {!! $contactContent !!}
                    </div>
                </div>
            </div>
            @endif
            
            <div class="row">
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Contact Information</h3>
                        <ul>
                            <li class="address">{{ $contactInfo['address'] }}</li>
                            <li class="phone"><a href="tel:{{ $contactInfo['phone'] }}">{{ $contactInfo['phone'] }}</a></li>
                            <li class="email"><a href="mailto:{{ $contactInfo['email'] }}">{{ $contactInfo['email'] }}</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6 animate-box">
                    <h3>Get In Touch</h3>
                    <form id="contactForm" action="{{ route('leads.store') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" id="fname" name="first_name" class="form-control" placeholder="Your firstname" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="lname" name="last_name" class="form-control" placeholder="Your lastname" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Your email address" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" id="subject" name="subject" class="form-control"
                                    placeholder="Your subject of this message" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                    placeholder="Say something about us" required></textarea>
                            </div>
                        </div>
                        
                        <!-- Hidden fields for lead tracking -->
                        <input type="hidden" name="source" value="website">
                        <input type="hidden" name="type" value="general">
                        
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(contactForm);
        
        // Add name field by combining first_name and last_name
        const firstName = formData.get('first_name');
        const lastName = formData.get('last_name');
        formData.set('name', firstName + ' ' + lastName);
        
        // Show loading state
        const submitBtn = contactForm.querySelector('input[type="submit"]');
        const originalText = submitBtn.value;
        submitBtn.value = 'Sending...';
        submitBtn.disabled = true;
        
        // Send AJAX request
        fetch(contactForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                showMessage('success', data.message);
                contactForm.reset();
            } else {
                // Show error messages
                if (data.errors) {
                    showMessage('error', 'Please fix the following errors: ' + Object.values(data.errors).flat().join(', '));
                } else {
                    showMessage('error', 'An error occurred. Please try again.');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('error', 'An error occurred. Please try again.');
        })
        .finally(() => {
            // Reset button state
            submitBtn.value = originalText;
            submitBtn.disabled = false;
        });
    });
    
    function showMessage(type, message) {
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.alert-message');
        existingMessages.forEach(msg => msg.remove());
        
        // Create new message
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert-message alert alert-${type === 'success' ? 'success' : 'danger'}`;
        alertDiv.style.cssText = 'margin: 20px 0; padding: 15px; border-radius: 5px;';
        alertDiv.textContent = message;
        
        // Insert before the form
        contactForm.parentNode.insertBefore(alertDiv, contactForm);
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
});
</script>
@endpush