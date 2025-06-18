<x-layouts.order-layout>
    <div class=" font-sans mt-20">
        <div class="w-full mx-auto">
            <!-- Browser-like container -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Website content -->
                <div class="p-6">
                    <!-- Form Container -->
                    <div class="bg-white rounded-lg p-8 max-w-4xl mx-auto" x-data="bloodRequestForm()">
                        <!-- Form Header -->
                        <div class="text-center mb-8">
                            <div class="inline-block p-3 bg-blue-100 rounded-full mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-12 w-12 text-blue-800">
                                    <path d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                                    <path d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                                    <path d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
                                </svg>

                            </div>
                            <h1 class="text-3xl font-bold text-gray-900">Request Bandwidth</h1>
                            <p class="text-gray-600 mt-2">
                                If you need blood or want to volunteer as a donor, submit a request, and we will review it and get in touch with you.
                            </p>
                        </div>

                        <!-- Form -->
                        <form @submit.prevent="submitForm">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- Blood Group -->
                                <div>
                                    <label for="blood_group" class="block text-sm font-medium text-gray-700 mb-2">Blood Group</label>
                                    <div class="relative">
                                        <select
                                            id="blood_group"
                                            x-model="formData.blood_group"
                                            class="block w-full pl-3 pr-10 py-3 border text-base border-gray-300 focus:outline-none focus:ring-blue-700 focus:border-blue-700 rounded-md appearance-none"
                                        >
                                            <option value="" disabled selected>Select blood group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p x-show="errors.blood_group" x-text="errors.blood_group" class="mt-1 text-sm text-red-600"></p>
                                </div>

                                <!-- Blood Quantity -->
                                <div>
                                    <label for="blood_quantity" class="block text-sm font-medium text-gray-700 mb-2">Blood Quantity</label>
                                    <div class="relative">
                                        <select
                                            id="blood_quantity"
                                            x-model="formData.blood_quantity"
                                            class="block w-full pl-3 pr-10 py-3 border text-base border-gray-300 focus:outline-none focus:ring-blue-700 focus:border-blue-700 rounded-md appearance-none"
                                        >
                                            <option value="" disabled selected>Select blood quantity</option>
                                            <option value="1">1 Unit</option>
                                            <option value="2">2 Units</option>
                                            <option value="3">3 Units</option>
                                            <option value="4">4 Units</option>
                                            <option value="5">5+ Units</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p x-show="errors.blood_quantity" x-text="errors.blood_quantity" class="mt-1 text-sm text-red-600"></p>
                                </div>

                                <!-- Select Date -->
                                <div>
                                    <label for="required_date" class="block text-sm font-medium text-gray-700 mb-2">Select Date</label>
                                    <div class="relative">
                                        <input
                                            type="date"
                                            id="required_date"
                                            x-model="formData.required_date"
                                            class="block w-full pl-3 pr-10 py-3 border text-base border-gray-300 focus:outline-none focus:ring-blue-700 focus:border-blue-700 rounded-md"
                                        >
                                    </div>
                                    <p x-show="errors.required_date" x-text="errors.required_date" class="mt-1 text-sm text-red-600"></p>
                                </div>

                                <!-- Contact Number -->
                                <div>
                                    <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-2">Contact Number</label>
                                    <div class="relative">
                                        <input
                                            type="tel"
                                            id="contact_number"
                                            x-model="formData.contact_number"
                                            placeholder="Enter your contact number"
                                            class="block w-full pl-3 pr-10 py-3 border text-base border-gray-300 focus:outline-none focus:ring-blue-700 focus:border-blue-700 rounded-md"
                                        >
                                    </div>
                                    <p x-show="errors.contact_number" x-text="errors.contact_number" class="mt-1 text-sm text-red-600"></p>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-6">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea
                                    id="description"
                                    x-model="formData.description"
                                    rows="6"
                                    placeholder="Write your description here"
                                    class="block w-full pl-3 pr-3 py-3 border text-base border-gray-300 focus:outline-none focus:ring-blue-700 focus:border-blue-700 rounded-md"
                                ></textarea>
                                <p x-show="errors.description" x-text="errors.description" class="mt-1 text-sm text-red-600"></p>
                            </div>

                            <!-- Form Actions -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button
                                    type="button"
                                    @click="resetForm"
                                    class="w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blood-red"
                                >
                                    Cancel
                                </button>
                                <button
                                    type="submit"
                                    class="w-full py-3 px-4 bg-blue-800 hover:bg--blue-100 border border-transparent rounded-md shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300"
                                    :disabled="isSubmitting"
                                >
                                    <span x-show="!isSubmitting">Send Blood Request</span>
                                    <!--<span x-show="isSubmitting" class="flex items-center justify-center">
                                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Processing...
                                    </span> -->
                                </button>
                            </div>
                        </form>

                        <!-- Success Message -->
                        <div x-show="showSuccess" x-cloak class="mt-6 p-4 bg-green-100 rounded-md">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">
                                        Your blood request has been submitted successfully. We will contact you soon.
                                    </p>
                                </div>
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button @click="showSuccess = false" class="inline-flex bg-green-100 rounded-md p-1.5 text-green-500 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <span class="sr-only">Dismiss</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
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
                div: JSON.stringify(this.formData)
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
        </script>
    </div>
</x-layouts.order-layout>
