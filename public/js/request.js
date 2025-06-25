
        function bloodRequestForm() {
            return {
                formData: {
                    blood_group: '',
                    blood_quantity: '',
                    required_date: '',
                    contact_number: '',
                    description: ''
                },
                errors: {},
                isSubmitting: false,
                showSuccess: false,

                resetForm() {
                    this.formData = {
                        blood_group: '',
                        blood_quantity: '',
                        required_date: '',
                        contact_number: '',
                        description: ''
                    };
                    this.errors = {};
                },

                validateForm() {
                    this.errors = {};

                    if (!this.formData.blood_group) {
                        this.errors.blood_group = 'Please select a blood group';
                    }

                    if (!this.formData.blood_quantity) {
                        this.errors.blood_quantity = 'Please select blood quantity';
                    }

                    if (!this.formData.required_date) {
                        this.errors.required_date = 'Please select a date';
                    } else {
                        const selectedDate = new Date(this.formData.required_date);
                        const today = new Date();
                        today.setHours(0, 0, 0, 0);

                        if (selectedDate < today) {
                            this.errors.required_date = 'Date cannot be in the past';
                        }
                    }

                    if (!this.formData.contact_number) {
                        this.errors.contact_number = 'Please enter your contact number';
                    } else if (!/^\d{10,15}$/.test(this.formData.contact_number.replace(/\D/g, ''))) {
                        this.errors.contact_number = 'Please enter a valid contact number';
                    }

                    if (!this.formData.description) {
                        this.errors.description = 'Please provide a description';
                    } else if (this.formData.description.length < 10) {
                        this.errors.description = 'Description must be at least 10 characters';
                    }

                    return Object.keys(this.errors).length === 0;
                },

                submitForm() {
                    if (!this.validateForm()) {
                        return;
                    }

                    this.isSubmitting = true;

                    // Get CSRF token
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch('/api/blood-requests', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify(this.formData)
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw new Error(data.message || 'Something went wrong');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        this.isSubmitting = false;
                        this.showSuccess = true;
                        this.resetForm();

                        // Hide success message after 5 seconds
                        setTimeout(() => {
                            this.showSuccess = false;
                        }, 5000);
                    })
                    .catch(error => {
                        this.isSubmitting = false;
                        console.error('Error:', error);

                        // Handle validation errors from server
                        if (error.errors) {
                            this.errors = error.errors;
                        } else {
                            alert(error.message || 'An error occurred. Please try again.');
                        }
                    });
                }
            };
        }
