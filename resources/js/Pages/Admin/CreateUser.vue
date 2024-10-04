<template>
    <AuthenticatedLayout>
    <div class="max-w-2xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
      <h1 class="text-2xl font-bold mb-6 text-gray-800">Register New User</h1>
      <form @submit.prevent="submitForm" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input
            id="name"
            v-model="form.name"
            type="text"
            required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            id="password"
            v-model="form.password"
            type="password"
            required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
        <div class="flex items-center">
          <input
            id="is_admin"
            v-model="form.is_admin"
            type="checkbox"
            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
          />
          <label for="is_admin" class="ml-2 block text-sm font-medium text-gray-700">Admin</label>
        </div>
        <div>
          <button
            type="submit"
            class="submit-button"
          >
            Register User
          </button>
        </div>
      </form>
    </div>
</AuthenticatedLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = ref({
  name: '',
  email: '',
  password: '',
  is_admin: false,
});

const submitForm = async () => {
  try {
    // Prepare the form data
    const formData = {
      name: form.value.name,
      email: form.value.email,
      password: form.value.password,
      is_admin: form.value.is_admin,
    };

    // Perform the POST request
    const response = await fetch('/admin/users/store', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify(formData),
    });

    // Check if the response is OK
    if (!response.ok) {
      const errorData = await response.json();
      console.error('Error:', errorData);
      throw new Error('Error creating user.');
    }

    // Redirect or show success message
    // For example, you could redirect to another page or clear the form
    console.log('User created successfully.');
    // Optionally, handle success (e.g., show a notification, redirect)
    form.value = { name: '', email: '', password: '', is_admin: false }; // Reset form

  } catch (error) {
    console.error('Submit Error:', error);
    // Optionally, handle errors (e.g., show a notification to the user)
  }
};
</script>

<style scoped>
/* Add CSS to ensure button visibility and style */
.submit-button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
  background-color: #007bff; /* Bootstrap blue color */
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background-color: #0056b3; /* Darker shade of blue on hover */
}

.submit-button:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(38, 143, 255, 0.5); /* Focus ring */
}
</style>